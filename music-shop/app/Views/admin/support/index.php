<h1>Support chat</h1>

<div id="chat-box" class="card p-3 mb-3" style="max-height: 400px; overflow-y: auto;">
    <!-- AJAX -->
</div>

<form action="/?r=admin/support-reply" method="POST">
    <textarea name="message" class="form-control mb-2" placeholder="Ваша відповідь..." required></textarea>
    <button class="btn btn-success">Answer</button>
</form>

<script>
function loadMessages() {
    fetch('/?r=support-ajax')
        .then(res => res.json())
        .then(data => {
            let html = '';

            data.forEach(m => {
                html += `
                    <div class="mb-2">
                        <strong class="${m.is_admin == 1 ? 'text-danger' : 'text-primary'}">
                            ${m.is_admin == 1 ? 'Admin' : m.name}:
                        </strong>
                        <div>${m.message.replace(/\n/g, "<br>")}</div>
                        <small class="text-muted">${m.created_at}</small>
                        <hr>
                    </div>`;
            });

            const box = document.getElementById('chat-box');
            const shouldScroll = box.scrollTop + box.clientHeight >= box.scrollHeight - 50;

            box.innerHTML = html;

            if (shouldScroll) {
                box.scrollTop = box.scrollHeight;
            }
        });
}

loadMessages();
setInterval(loadMessages, 3000);
</script>
