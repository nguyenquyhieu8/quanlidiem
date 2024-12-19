$(document).ready(function () {
    $('.item-checked').on('change', function () {
        var allChecked = $('.item-checked:checked').length === $('.item-checked').length;
        $('.all').prop('checked', allChecked);
    });

    $('.all').on('change', function () {
        var allChecked = $(this).prop('checked');
        $('.item-checked').prop('checked', allChecked);
    });
    // Sự kiện khi nút được click
    $('.submitButton').on('click', function () {
        // Lấy danh sách các '.item-checked' đã được chọn
        var selectedItems = $('.item-checked:checked').map(function () {
            return $(this).val();
        }).get();
        console.log(selectedItems);
        if (selectedItems.length > 0) {
            $.ajax({
                url: '/Ajax/guidanhgia',
                method: 'POST',
                data: { selectedItems: selectedItems },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    window.location.reload();
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        } else {
            // Thông báo cho người dùng rằng không có item nào được chọn
            alert('Vui lòng chọn ít nhất một item.');
        }
    });

});


