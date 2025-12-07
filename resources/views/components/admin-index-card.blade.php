<div class="card mb-4">
  <div class="card-body p-0">
    {{ $slot }}
  </div>
  @if(isset($footer) && trim($footer) !== '')
    <div class="card-footer clearfix">
      {{ $footer }}
    </div>
  @endif
</div>
