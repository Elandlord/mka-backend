@if($errors->any())
    <h4>{{$errors->first()}}</h4>
@endif

<div>
    @if($pagination != null)
        {{ $pagination->links() }}
    @endif
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="bg-main">        
            <tr>
                <th></th>
                <th></th>
                @foreach($fields as $field)
                    <th style="min-width: 140px;">{{ $field }}</th>
                @endforeach
            </tr>
        </thead>
        @foreach($objects as $index => $object)    
            <tr class="pointer">            
                <td>
                    <a href="{{ $entity_name }}/{{ $object->id }}">
                        <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">
                            <i class="material-icons">edit</i>
                        </button>
                    </a>
                </td>
                <td>
                    <form method="POST" action="{{ $entity_name }}/{{ $object->id }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger transition-fast text-color-light">
                            <i class="material-icons">delete_forever</i>
                        </button>
                    </form>
                </td>
                <?php $vars = get_object_vars($object); ?>
                @foreach($vars as $key=>$var) 
                    @if(!is_array($var))
                        @if($var == "")
                            <td><strong>-</strong></td>                    
                        @elseif(substr($var, 0, 1) == "#")
                            <td><span class="inline-block">{{ $var }}</span> <span class="tenant-color-box inline-block" style="background-color: {{ $var }}"></span></td>
                        @else
                            <td>{{ $var }}</td>
                        @endif
                    @else
                        <td>    
                            @foreach($var as $field)
                                @if($field == "")
                                    <strong>-</strong>                  
                                @else
                                    - {{ $field }}
                                @endif
                                <br/>
                            @endforeach
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>
</div>