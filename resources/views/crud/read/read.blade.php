<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="bg-main">        
            <tr>
                <th></th>
                <th></th>
                @foreach($fields as $field)
                    <th style="min-width: 130px;">{{ $field }}</th>
                @endforeach
            </tr>
        </thead>
        @foreach($objects as $index => $object)    
            <tr class="pointer">            
                <td>
                    <a href="{{ $entity_name }}/{{ $object->id }}">
                        <button class="btn bg-secondary text-color-light">Edit</button>
                    </a>
                </td>
                <td>
                    <form method="DELETE" action="{{ $entity_name }}/{{ $object->id }}">
                        <button class="btn bg-error text-color-light">Delete</button>
                    </form>
                </td>
                <?php $vars = get_object_vars($object); ?>
                @foreach($vars as $key=>$var) 
                    <td>{{ $var }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</div>