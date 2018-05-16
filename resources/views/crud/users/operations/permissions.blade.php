<div class="table-responsive">
    @foreach($users as $index => $object)
        <div class="pointer collapseAble" data-toggle="collapse" data-target="#{{ $object->id }}" aria-expanded="false" aria-controls="collapseExample">
            <h2 class="space-inside-sm text-semi-bold inline-block">{{ $object->first_name }} {{ $object->insertion }} {{ $object->last_name }}</h2>

            <i id="{{ $object->id }}-caret-right" style="position: relative; top: 7px;" class="inline-block material-icons text-color-main">
                keyboard_arrow_right
            </i>
        </div>
        <div id="{{ $object->id }}" class="collapse in">        
            <form id="{{ $index }}" method="POST" action="/users/permissions">  
            @csrf    
                <table class="table table-striped table-hover shadow-xs">
                    <thead class="bg-main">        
                        <tr>
                            <th>Permissions</th>
                            <th></th>
                        </tr>
                    </thead>
                        
                            <input type="hidden" name="user_id" value="{{ $object->id }}" />
                            <input type="hidden" name="user_first_name" value="{{ $object->first_name }}" />
                            <input type="hidden" name="user_insertion" value="{{ $object->insertion }}" />                            
                            <input type="hidden" name="user_last_name" value="{{ $object->last_name }}" />
                            <tr>           
                                <td>
                                    @foreach($permissions as $i => $permission)    
                                        {{-- To-do, see if checked. --}}
                                        <div class="col-lg-4">                                    
                                            <label class="pointer text-regular" for="{{ $permission->id }}{{ $object->id }}">{{ $permission->name }}</label>
                                            <input style="position: relative; top: 2px;" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="{{ $permission->id }}{{ $object->id }}" />
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