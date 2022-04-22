@can('bilgi_talepleri_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.bilgi-talepleris.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bilgiTalepleri.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.bilgiTalepleri.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-talepStatuBilgiTalepleris">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.musteri_adi') }}
                        </th>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.telefon') }}
                        </th>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.not_ekle') }}
                        </th>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.talep_asama') }}
                        </th>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.talebi_sorumlusu') }}
                        </th>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.talep_statu') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bilgiTalepleris as $key => $bilgiTalepleri)
                        <tr data-entry-id="{{ $bilgiTalepleri->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bilgiTalepleri->id ?? '' }}
                            </td>
                            <td>
                                {{ $bilgiTalepleri->musteri_adi ?? '' }}
                            </td>
                            <td>
                                {{ $bilgiTalepleri->telefon ?? '' }}
                            </td>
                            <td>
                                {{ $bilgiTalepleri->not_ekle ?? '' }}
                            </td>
                            <td>
                                {{ $bilgiTalepleri->talep_asama->asamaadi ?? '' }}
                            </td>
                            <td>
                                {{ $bilgiTalepleri->talebi_sorumlusu->name ?? '' }}
                            </td>
                            <td>
                                {{ $bilgiTalepleri->talep_statu->statu_adi ?? '' }}
                            </td>
                            <td>
                                @can('bilgi_talepleri_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.bilgi-talepleris.show', $bilgiTalepleri->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('bilgi_talepleri_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.bilgi-talepleris.edit', $bilgiTalepleri->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('bilgi_talepleri_delete')
                                    <form action="{{ route('admin.bilgi-talepleris.destroy', $bilgiTalepleri->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('bilgi_talepleri_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bilgi-talepleris.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-talepStatuBilgiTalepleris:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection