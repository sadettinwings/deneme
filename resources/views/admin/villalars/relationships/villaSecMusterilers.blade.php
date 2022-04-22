@can('musteriler_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.musterilers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.musteriler.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.musteriler.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-villaSecMusterilers">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.musteri_adi') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.musteri_telefon') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.musteri_mail') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.instagram') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.giris_tarihi') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.cikis_tarihi') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.genel_zaman') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.minbutce') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.maxbutce') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.villa_turu') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.bolge_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.villa_ozellikleri') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.asama_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.statu_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.talebi_alan') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.sorumlu_satisci') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.villa_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.villalar.fields.villa_kodu') }}
                        </th>
                        <th>
                            {{ trans('cruds.villalar.fields.villa_adi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($musterilers as $key => $musteriler)
                        <tr data-entry-id="{{ $musteriler->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $musteriler->id ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->musteri_adi ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->musteri_telefon ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->musteri_mail ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->instagram ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->giris_tarihi ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->cikis_tarihi ?? '' }}
                            </td>
                            <td>
                                @foreach($musteriler->genel_zamen as $key => $item)
                                    <span class="badge badge-info">{{ $item->talep_ettigi_zaman }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $musteriler->minbutce ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->maxbutce ?? '' }}
                            </td>
                            <td>
                                @foreach($musteriler->villa_turus as $key => $item)
                                    <span class="badge badge-info">{{ $item->tur_adi }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($musteriler->bolge_secs as $key => $item)
                                    <span class="badge badge-info">{{ $item->bolgeadi }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($musteriler->villa_ozellikleris as $key => $item)
                                    <span class="badge badge-info">{{ $item->ozellikadi }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $musteriler->asama_sec->asamaadi ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->statu_sec->statu_adi ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->talebi_alan->name ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->sorumlu_satisci->name ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->villa_sec->villa_kodu ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->villa_sec->villa_kodu ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->villa_sec->villa_adi ?? '' }}
                            </td>
                            <td>
                                @can('musteriler_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.musterilers.show', $musteriler->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('musteriler_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.musterilers.edit', $musteriler->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('musteriler_delete')
                                    <form action="{{ route('admin.musterilers.destroy', $musteriler->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('musteriler_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.musterilers.massDestroy') }}",
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
  let table = $('.datatable-villaSecMusterilers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection