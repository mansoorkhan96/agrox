
    @forelse ($products as $product)
    @php
        extract($product)
    @endphp
        <tr>
            <td>{{ $id }}</td>
            <td>
                <img class="mr-3" src="{{ asset('/storage/' . $featured_image) }}" alt="image" width="60" /> {{$name}}</td>
            <td class="android">
                @forelse ($categories as $category)
                    {{ $category['name'] }}
                    @if (! $loop->last)|@endif
                @empty
                    Uncategorized
                @endforelse
            </td>
            <td>{{ $price }}</td>
            <td>{{ $user['name'] }}</td>
            <td>
                @if($quantity < 1)
                <span class="badge badge-danger badge-pill">Out of stock</span>
                @elseif ($quantity <= 10)
                {{ $quantity }}<span class="badge d-inline ml-1 badge-warning badge-pill">Low stock</span>
                @else
                {{ $quantity }}
                @endif
                
            </td>
            <td>
                <a class="text-light mr-3 font-16" href="{{ route('products.edit', $id) }}"><i class="ti-pencil"></i></a>

                {{-- <a delete-id="{{ $id }}" class="delete text-light font-16" href="javascript:;"><i class="ti-trash"></i></a> --}}

                {{ Form::open(['route' => ['products.destroy', $id], 'class' =>'d-inline delete-form', 'method' => 'DELETE']) }}
                    <input type="hidden" name="id" value="{{ $id }}">
                    <button type="submit" class="no-btn text-light font-16"><i class="ti-trash"></i></button>
                {{ Form::close() }}
            </td>
        </tr>
    @empty
    <tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No records found</td></tr>
    @endforelse