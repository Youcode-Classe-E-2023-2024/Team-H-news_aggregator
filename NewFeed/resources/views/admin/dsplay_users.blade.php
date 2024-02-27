

{{-- @foreach($users as $user)
    @dd($user->name);
    {{-- {{ $user->name }} --}}
    <!-- Access other user properties as needed -->
{{-- @endforeach  --}}

<x-layouts.admin-layout title="Add-Ressource" >
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">
                
                <div class="row layout-top-spacing">
                    <div class=" mb-3">
                        <form action="{{route('restore')}}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-primary">restore</button>
                        </form>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-8">
                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Create_at</th>
                                        <th>Edite_at</th>
                                        
                                        <th class="no-content">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td> {{$user->name}} </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->updated_at}}</td>
                                        <td class="text-center ">
                                            <form action="{{route('softdelete', ['user' => $user->id])}}" method="POST" >
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn"><span><i class="fa-solid fa-trash"></i></span></button>

                                            </form>   
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    
                </div>
            </div>


        </div>

    </div>
</x-layouts.admin-layout >

