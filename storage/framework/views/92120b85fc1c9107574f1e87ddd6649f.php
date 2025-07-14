<?php $__env->startSection('title', 'Chats'); ?>

<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
  <h3 class="page-title">Chats</h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Chat</li>
    </ol>
  </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header"><strong>Conversations</strong></div>
      <div class="card-body p-2" id="conversation-list" style="max-height: 500px; overflow-y: auto;">
        <!-- Conversations will be dynamically loaded here -->
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <strong id="conversation-title">Chat</strong>
      </div>
      <div class="card-body" id="chat-box" style="height: 400px; overflow-y: auto;">
        <!-- Messages will appear here -->
      </div>
      <div class="card-footer">
        <form id="message-form">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="conversation_sid" id="conversation_sid">
          <div class="input-group">
            <input type="text" name="body" id="message-input" class="form-control" placeholder="Type your message..." required>
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function () {
    fetchConversations();

    // Setup CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function fetchConversations() {
        $.ajax({
            url: '/admin/chat/conversations',
            method: 'GET',
            success: function (res) {
                let html = '';
                res.conversations.forEach(convo => {
                    html += `<div class="conversation-item p-2 border-bottom cursor-pointer" data-sid="${convo.sid}" data-name="${convo.friendly_name}">
                        ${convo.friendly_name}
                    </div>`;
                });
                $('#conversation-list').html(html);
            }
        });
    }

    $(document).on('click', '.conversation-item', function () {
        const sid = $(this).data('sid');
        const name = $(this).data('name');

        $('#conversation_sid').val(sid);
        $('#conversation-title').text(name);

        fetchMessages(sid);
    });

    function fetchMessages(sid) {
        $.ajax({
            url: `/admin/chat/${sid}/messages`,
            method: 'GET',
            success: function (res) {
                let messages = '';
                res.forEach(msg => {
                    messages += `<div><strong>${msg.author}:</strong> ${msg.body} <small class="text-muted float-right">${msg.dateCreated}</small></div><hr>`;
                });
                $('#chat-box').html(messages);
            }
        });
    }

    $('#message-form').submit(function (e) {
        e.preventDefault();

        const sid = $('#conversation_sid').val();
        const body = $('#message-input').val();

        if (!body.trim()) return;

        $.ajax({
            url: `/admin/chat/${sid}/send`,
            method: 'POST',
            data: { body: body },
            success: function () {
                $('#message-input').val('');
                fetchMessages(sid);
            }
        });
    });
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/chat/index.blade.php ENDPATH**/ ?>