@extends('admin.maintemplate.maintemplate')



@section('content')

<style>
     .form-switch {
            padding-left: 2.5em;
        }
</style>

 <!--=========================*
               Main Section
       *===========================-->
       <div class="vz_main_container">
        <div class="vz_main_content">
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.maintemplate.form_alert')
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card_title">{{ $title }}</h4>
                            <form id="menu_form"
                                action="{{ isset($menu) ? route('menu.store', $menu->id) : route('menu.store') }}"
                                method="POST" novalidate="novalidate">
                                @csrf
                                @if (isset($menu))
                                    @method('PUT')
                                @endif

                                @foreach ($groupedMenus as $group => $menus)
                                    <h4 class="mt-4">{{ ucfirst($group) }}</h4>
                                    <div class="form-row mb-3">
                                        @foreach ($menus as $menu)
                                            <div class="col-md-4 mb-3">
                                                <label>{{ Str::title(Str::replace('_', ' ', Str::beforeLast($menu->key, '_'))) }}:</label>

                                                <input type="text" class="form-control"
                                                    name="menus[{{ $menu->id }}][name]"
                                                    value="{{ old('menus.' . $menu->id . '.name', $menu->name) }}" required>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach

                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--=========================*
                    Footer
       *===========================-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2025. All right reserved. Followup.</p>
            </div>
        </footer>
        <!--=========================*
                End Footer
       *===========================-->
    </div>

    <script>
         $(document).ready(function() {
            $("#menu_form").submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                let form = $(this);
                let formData = form.serialize();
                let url = form.attr("action");
                let method = form.find("input[name='_method']").val() || "POST";

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function(response) {
                        toastr.success(response.message, "Success!");
                        oTable.table().draw(); // Refresh table after update
                    },
                    error: function(xhr) {
                        let errorMessage = "An unexpected error occurred.";

                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            errorMessage = xhr.responseText;
                        }

                        toastr.error(errorMessage, "Error!");
                    },
                });
            });
        });

    </script>
@endsection
