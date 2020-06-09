<div class="my-3 flex justify-between items-center">
  <div class="flex items-center">
    <span class="px-2 py-2 rounded text-green-500">
      {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} of {{ $paginator->total()  }}
    </span>
  </div>
  <div class="flex items-center">
    <a href="{{ $paginator->previousPageUrl() }}" class="px-2 py-2 rounded text-green-500">
      Prev
    </a>
    <a href="{{ $paginator->previousPageUrl() }}" class="ml-3 px-2 py-2 rounded text-green-500">
      Next
    </a>
  </div>
</div>