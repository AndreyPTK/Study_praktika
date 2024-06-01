document.querySelectorAll('.deleteMemberButton').forEach(button => {
    button.addEventListener('click', function() {
        const memberId = this.getAttribute('data-member-id');
        if (confirm('Вы уверены, что хотите удалить этого участника?')) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_member.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status === 200) {
                    location.reload();
                }
            };
            xhr.send(`memberId=${memberId}&projectId=<?php echo $projectId; ?>`);
        }
    });
});