$(document).ready(function() {
    $(".admin-users-page .button-delete").click(function() {
        const id = $(this).data("id");
        $(".confirm-box .button-accept").attr("data-id", id);
    });

    $(".confirm-box .button-accept").click(function() {
        var id = $(this).data("id");

        $.ajax({
            url: "/app?controller=user&action=deleteUser",
            type: "POST",
            data: { 
                id: id,
                button: "button-delete",
            },
            success: function(response) {
                const users = JSON.parse(response);

                $(".admin-users-page .table-users tbody").html(users.map(({ id, name, email, authorization }, index) => {
                    const numberAuthorization = +authorization;

                    return `
                        <tr>
                            <td>${ index + 1 }</td>
                            <td>${ name }</td>
                            <td>${ email }</td>
                            <td>
                                ${ numberAuthorization === 1 ? `<p style="display: inline-block; color: white; padding: 8px 15px; font-size: 1.4rem; font-weight: 700; border-radius: 5px; background-color: var(--extra-bold-orange)">Admin</p>` : `<p style="display: inline-block; color: white; padding: 8px 15px; font-size: 1.4rem; font-weight: 700; border-radius: 5px; background-color: var(--extra-light-orange)">User</p>` }
                            </td>
                            <td>
                                <a href="/app?controller=user&action=pageEditUser&id=${ id }" class="link-edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    <span>Edit</span>
                                </a>

                                <label for="toggle-confirm-box" class="clear button-delete" data-id=${ id }>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Delete</span>
                                </label>
                            </td>
                        </tr>
                    `;
                }));
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});