<div class="table-responsive">
    @foreach($tenants as $index => $object)
        <h2 class="space-inside-sm text-semi-bold">{{ $object->name }}</h2>
        <form id="{{ $index }}" method="POST" action="/tenants/modules">  
        @csrf    
            <table class="table table-striped table-hover">
                <thead class="bg-main">        
                    <tr>
                        <th>Modules</th>
                        <th></th>
                    </tr>
                </thead>
                <input type="hidden" name="tenant_id" value="{{ $object->id }}" />
                <input type="hidden" name="tenant_name" value="{{ $object->name }}" />
                <tr>           
                    <td>
                        @foreach($modules as $i => $module)    
                            {{-- To-do, see if checked. --}}
                            <div class="col-lg-4">      
                                <label class="pointer text-regular" for="{{ $module->id }}{{ $object->name }}">{{ $module->name }}</label>
                                <input style="position: relative; top: 2px;" type="checkbox" name="modules[]" value="{{ $module->id }}" id="{{ $module->id }}{{ $object->name }}" />                                  
                            </div>                        
                        @endforeach
                    </td>
                    <td>
                        <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
                    </td>
                </tr>
            </table>
        </form>  
    @endforeach
</div>