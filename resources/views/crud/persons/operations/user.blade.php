{{-- <div class="form-group">
    <label for="user_id">User</label>
    <select name="user_id" id="user_id" class="form-control">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
        @endforeach
    </select>
</div> --}}

<div class="table-responsive">
    @foreach($persons as $index => $object)
        <div class="pointer collapseAble" data-toggle="collapse" data-target="#{{ $object->id }}" aria-expanded="false" aria-controls="collapseExample">
            <h2 class="space-inside-sm text-semi-bold inline-block">{{ $object->first_name }} {{ $object->insertion }} {{ $object->last_name }}</h2>

            <i id="{{ $object->id }}-caret-right" style="position: relative; top: 7px;" class="inline-block material-icons text-color-main">
                keyboard_arrow_right
            </i>
        </div>
        <div id="{{ $object->id }}" class="collapse in">        
            <form id="{{ $index }}" method="POST" action="/persons/user">  
            @csrf    
                <table class="table table-striped table-hover">
                    <thead class="bg-main">        
                        <tr>
                            <th>Users</th>
                            <th></th>
                        </tr>
                    </thead>
                    <input type="hidden" name="person_id" value="{{ $object->id }}" />
                    <input type="hidden" name="person_name" value="{{ $object->first_name }} {{ $object->last_name }}" />
                    <tr>           
                        <td>
                            @foreach($users as $i => $user)    
                                {{-- To-do, see if checked. --}}
                                <div class="col-lg-4">      
                                    <label class="pointer text-regular" for="{{ $user->id }}{{ $user->first_name }}">{{ $user->first_name }} {{ $user->insertion }} {{ $user->last_name }}</label>
                                    <input style="position: relative; top: 2px;" type="radio" name="user" value="{{ $user->id }}" id="{{ $user->id }}{{ $user->first_name }}" @if($object->user_id == $user->id) checked="checked" @endif/>                                  
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