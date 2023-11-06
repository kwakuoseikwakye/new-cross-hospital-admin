<div class="modal fade" id="send-msg-modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Reminders</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row shadow-sm border border-default p-2 rounded mx-1 mb-3">
                    <!-- Notification types -->
                    <div class="col">
                        <h6 class="border-bottom">Select Reminder Type</h6>
                        <!-- SMS notification -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" selected type="radio" id="sms-notification-type" required
                                form="send-message-form" name="notificationType" value="sms">
                            <label class="form-check-label" for="sms-notification-type">SMS</label>
                        </div>

                        <!-- Push notification -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="push-notification-type"
                                title="Send push notifications" disabled required form="send-message-form"
                                name="notificationType" value="push">
                            <label class="form-check-label" for="push-notification-type">Email

                            </label>
                        </div>
                    </div>
                </div>

                <!-- Notification content -->
                <div class="row m-1 ">
                    <div class="col mx-auto p-3 border border-default rounded">
                        {{-- <h6 class="border-bottom">Notification Content</h6>
                            <br> --}}
                        <form id="send-message-form">
                            <!-- Message Recipient -->
                            <input type="text" name="phone" hidden id="message-recipient-phone">
                            <input type="text" name="id" hidden id="message-recipient-code">
                            <!-- Notification title -->
                            <div class="form-group" id="notification-title-holder" hidden>
                                <label for="push-notification-title">Push notification title:</label>
                                <input placeholder="eg. Upcoming free health screening" type="text"
                                    class="form-control" name="notificationTitle" id="push-notification-title">
                            </div>

                            <!-- Notification body -->
                            <div class="form-group">
                                <label for="notification-body">Message:</label>
                                <textarea required placeholder="Enter the content of the message here" rows="8" col="5"
                                    class="form-control" name="notificationBody"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Notification content -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="reset" form="send-message-form" class="btn btn-light btn-sm">Reset</button>
                <button type="submit" form="send-message-form" name="submit"
                    class="btn btn-primary btn-sm">Send</button>
            </div>
        </div>
    </div>
</div>
<script>
      (function () {
          let notificationForm = document.forms["send-message-form"];
          let notificationTitleHolder = document.getElementById("notification-title-holder");
  
          notificationForm.notificationType.forEach(type => {
              type.addEventListener("change", function (e) {
                  switch (type.value) {
                      case "push":
                          notificationTitleHolder.hidden = false;
                          notificationForm.notificationTitle.hidden = false;
                          notificationForm.notificationTitle.required = true;
                          break;
                      default:
                          notificationTitleHolder.hidden = true;
                          notificationForm.notificationTitle.hidden = true;
                          notificationForm.notificationTitle.required = false;
                          break;
                  }
              });
          });
  
          notificationForm.addEventListener("submit", function (e) {
              e.preventDefault();
              let formdata = new FormData();
              formdata.append("messageType", this.notificationType.value);
              formdata.append("messageBody", this.notificationBody.value);
              formdata.append("messageTitle", this.notificationTitle.value);
              formdata.append("id", this.id.value);
              formdata.append("phone", this.phone.value);
  
              fetch(`/api/send_message`, {
                      method: "POST",
                      body: formdata,
                  }).then(res => res.json())
                  .then(data => {
                  })
  
              Swal.fire({
                  title: "",
                  text: "The sms will be delivered to this patient",
                  timer: 2800,
                  icon: "success",
                  showConfirmButton: false,
              });
              notificationForm.reset();
              $("#send-msg-modal").modal('hide');
          });
      })();
  
  </script>
