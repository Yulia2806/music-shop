<!-- <h1>Support chat</h1>

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
</script> -->
<h2>Support – Admin Panel</h2>

<div class="card shadow">
    <div id="admin-chat-box"
         class="card-body"
         style="height:400px; overflow-y:auto; background:#f8f9fa">
    </div>

    <div class="card-footer">
        <form id="admin-chat-form" class="d-flex gap-2">
            <input type="text"
                   id="admin-chat-input"
                   class="form-control"
                   placeholder="Admin reply..."
                   required>
            <button class="btn btn-primary">Send</button>
        </form>
    </div>
</div>

<script>
loadAdminMessages();
setInterval(loadAdminMessages, 3000);

function loadAdminMessages() {
    fetch('/?r=admin-support-ajax')
        .then(res => res.json())
        .then(resp => {
            const box = document.getElementById('admin-chat-box');
            box.innerHTML = '';

            resp.data.forEach(m => {
                const div = document.createElement('div');
                div.className = m.is_admin == 1
                    ? 'text-end text-primary mb-2'
                    : 'text-start mb-2';

                div.innerHTML = `
                    <span class="badge ${m.is_admin == 1 ? 'bg-primary' : 'bg-secondary'}">
                        ${m.is_admin == 1 ? 'Admin' : 'User'}
                    </span>
                    <div>${escapeHtml(m.message)}</div>
                `;

                box.appendChild(div);
            });

            box.scrollTop = box.scrollHeight;
        });
}

document.getElementById('admin-chat-form').addEventListener('submit', e => {
    e.preventDefault();

    fetch('/?r=admin-support-send', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'message=' + encodeURIComponent(
            document.getElementById('admin-chat-input').value
        )
    })
    .then(res => res.json())
    .then(() => {
        document.getElementById('admin-chat-input').value = '';
        loadAdminMessages();
    });
});

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
</script>
