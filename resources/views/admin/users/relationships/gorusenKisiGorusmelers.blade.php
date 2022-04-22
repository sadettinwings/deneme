@can('gorusmeler_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.gorusmelers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.gorusmeler.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.gorusmeler.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-gorusenKisiGorusmelers">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.gorusmeler.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.gorusmeler.fields.musteri_sec_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.gorusmeler.fields.gorusen_kisi') }}
                        </th>
                        <th>
                            {{ trans('cruds.gorusmeler.fields.not') }}
                        </th>
                        <th>
                            {{ trans('cruds.gorusmeler.fields.kategori') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gorusmelers as $key => $gorusmeler)
                        <tr data-entry-id="{{ $gorusmeler->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $gorusmeler->id ?? '' }}
                            </td>
                            <td>
                                {{ $gorusmeler->musteri_sec_2->musteri_adi ?? '' }}
                            </td>
                            <td>
                                {{ $gorusmeler->gorusen_kisi->name ?? '' }}
                            </td>
                            <td>
                                {{ $gorusmeler->not ?? '' }}
                            </td>
                            <td>
                                {{ $gorusmeler->kategori->kategori ?? '' }}
                            </td>
                            <td>
                                @can('gorusmeler_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.gorusmelers.show', $gorusmeler->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('gorusmeler_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.gorusmelers.edit', $gorusmeler->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('gorusmeler_delete')
                                    <form action="{{ route('admin.gorusmelers.destroy', $gorusmeler->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('gorusmeler_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.gorusmelers.massDestroy') }}",
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
  let table = $('.datatable-gorusenKisiGorusmelers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection