@extends('layouts.app')
@section('content')
    @include('layouts.sections.book-consult')
    @include('layouts.footer')
@endsection
@section('page-scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('change', '#guidance_package', function() {
            var selectedValue = $(this).val();
            var url = '';

            // Determine the URL based on the selected value
            switch (selectedValue) {
                case 'single session':
                    url = 'https://buy.stripe.com/test_dR64jS8i7fN045a5kn';
                    break;
                case 'Bundle One':
                    url = 'https://buy.stripe.com/test_aEU17G69ZasGgRW9AB';
                    break;
                case 'Bundle Two':
                    url = 'https://buy.stripe.com/test_fZe4jSgODdES45adQQ';
                    break;
                default:
                    console.error('Invalid selection');
                    return; // Exit if no valid option is selected
            }
            if ($('#selected_date').val() == '') {
                showErrorToast('Date field is required');
                return;
            }else if($('#email').val()  == ''){
                showErrorToast('Email field is required');
                return;
            }else if($('#phone').val()  == ''){
                showErrorToast('Phone field is required');
                return;
            }
            // Serialize form data
            var formData = {
                'service': $('.service').val(),
                'selected_date': $('#selected_date').val(),
                'guidance_package': $('#guidance_package').val(),
                'email': $('#email').val(),
                'phone': $('#phone').val(),
            };

            // console.log(formData);
            $.ajax({
                url: '{{ route('get.user.data') }}', // Replace with your actual route URL
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log('Data saved successfully:', response);
                    // Redirect to the determined URL after the AJAX call
                    window.location.href = url;
                },
                error: function(err) {
                    // console.error('Error saving data:', err);
                }
            });
        });
    </script>
    
@endsection
