<div>
  {{$columnName}}
  @if ($sortColumn !== $columnName)
  <i class="fa fa-chevron-up"></i>
  <i class="fa fa-chevron-down"></i>
  @elseif($sortDirection === 'ASC')
  <i class="fa fa-chevron-down"></i>
  @else
  <i class="fa fa-chevron-up"></i>    
  @endif
</div>