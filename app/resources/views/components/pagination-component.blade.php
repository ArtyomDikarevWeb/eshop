@if($paginator->hasPages())
    <div class="w-full flex my-3">
        <div class="flex gap-4 mx-auto">
            @if (!$paginator->onFirstPage())
                @if(($paginator->currentPage() - 1) === 1)
                    <a href="{{$paginator->url(1)}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ 1 }}</p>
                        </div>
                    </a>
                @elseif(($paginator->currentPage() - 1) === 2)
                    <a href="{{$paginator->url(1)}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ 1 }}</p>
                        </div>
                    </a>
                    <a href="{{$paginator->previousPageUrl()}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ $paginator->currentPage() - 1 }}</p>
                        </div>
                    </a>
                @else
                    <a href="{{$paginator->url(1)}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ 1 }}</p>
                        </div>
                    </a>
                    <div>...</div>
                    <a href="{{$paginator->previousPageUrl()}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ $paginator->currentPage() - 1 }}</p>
                        </div>
                    </a>
                @endif
            @endif

            <a href="{{$paginator->url($paginator->currentPage())}}">
                <div class="w-10 h-10 bg-slate-800 flex justify-center items-center">
                    <p class="text-green-300 font-bold">{{ $paginator->currentPage() }}</p>
                </div>
            </a>

            @if(($paginator->lastPage() === 2) && ($paginator->currentPage() !== 2))
                <a href="{{$paginator->nextPageUrl()}}">
                    <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                        <p class="text-cyan-50">{{ $paginator->lastPage() }}</p>
                    </div>
                </a>
            @elseif($paginator->lastPage() >= 3 && $paginator->currentPage() < $paginator->lastPage())
                @if(($paginator->currentPage()) === ($paginator->lastPage() - 1))
                    <a href="{{$paginator->url($paginator->lastPage())}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ $paginator->lastPage() }}</p>
                        </div>
                    </a>
                @elseif(($paginator->currentPage() + 1) === ($paginator->lastPage() - 1))
                    <a href="{{$paginator->nextPageUrl()}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ $paginator->currentPage() + 1 }}</p>
                        </div>
                    </a>
                    <a href="{{$paginator->url($paginator->lastPage())}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ $paginator->lastPage() }}</p>
                        </div>
                    </a>
                @else
                    <a href="{{$paginator->nextPageUrl()}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ $paginator->currentPage() + 1 }}</p>
                        </div>
                    </a>
                    <div>...</div>
                    <a href="{{$paginator->url($paginator->lastPage())}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ $paginator->lastPage() }}</p>
                        </div>
                    </a>
                @endif
            @endif
        </div>
    </div>
@endif