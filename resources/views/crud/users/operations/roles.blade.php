<div class="table-responsive">
    @foreach($users as $index => $object)
        <div class="pointer collapseAble" data-toggle="collapse" data-target="#{{ $object->id }}" aria-expanded="false" aria-controls="collapseExample">
            <h2 class="space-inside-sm text-semi-bold inline-block">{{ $object->first_name }} {{ $object->insertion }} {{ $object->last_name }}</h2>

            <i id="{{ $object->id }}-caret-right" style="position: relative; top: 7px;" class="inline-block material-icons text-color-main">
                keyboard_arrow_right
            </i>
        </div>
        <div id="{{ $object->id }}" class="collapse in">        
            <form id="{{ $index }}" method="POST" action="/users/roles">  
            @csrf    
                <table class="table table-striped table-hover shadow-xs">
                    <thead class="bg-main">        
                        <tr>
                            <th>Roles</th>
                            <th></th>
                        </tr>
                    </thead>
                        <input type="hidden" name="user_id" value="{{ $object->id }}" />
                        <input type="hidden" name="user_first_name" value="{{ $object->first_name }}" />
                        <input type="hidden" name="user_insertion" value="{{ $object->insertion }}" />                            
                        <input type="hidden" name="user_last_name" value="{{ $object->last_name }}" />
                        <tr>           
                            <td>
                                @foreach($roles as $i => $role)    
                                    {{-- To-do, see if checked. --}}
                                    <div class="col-lg-4">                                    
                                        <label class="pointer text-regular" for="{{ $role->id }}{{ $object->id }}">{{ $role->name }}</label>
                                        <input @if(in_array($role->id, $object->roles)) checked @endif style="position: relative; top: 2px;" type="checkbox" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}{{ $object->id }}" />
                                    </div>                       
                                @endforeach
                            </td>
                            <td>
                                <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
                            </td>
                        </tr>
                </table>
            </form>  
        </div>
    @endforeach
</div>