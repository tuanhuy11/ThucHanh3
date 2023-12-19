$(document).ready(function() {
    $('.btnDelete').on('click', function() {
        let id = $(this).attr('data-id')
        let currentRow = $(this).closest('.tableRow')
        $('#btn-yes').on('click', function() {
            $.ajax({
                url: 'index.php?controller=course&action=delete',
                method: 'POST',
                data: { id },
                dataType: 'JSON',
                success: response => {
                    if (response && !response.error) {
                        currentRow.remove()
                    }
                    else {
                        let error = $('<h4 class="text-danger text-center">Delete is failed</h4>');
                        $('.container').prepend(error);
                    }
                }
            })
        })
    })
})
