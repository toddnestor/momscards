<?php
require_once("../inc/config.php");
session_start();
$pageTitle = "Contact Mike";
$section = "contact";
include(ROOT_PATH . 'inc/header.php'); ?>

	<div class="section page">

		<div class="wrapper">
		
		
			<h1>Contact</h1>
			
			<?php
			$message = array();
			$message["sent"] = "Your message was sent!";
			$message["error"] = "You must fill out the complete form to submit a message!";
			$message["spam"] = "You appear to be submitting spam, please don't do that.";
			$message["email"] = "You must use a valid e-mail address.";
			
			echo isset($_GET['msg']) ? '<p class="message">' . $message[$_GET["msg"]] . '</p>':"<p>I&rsquo;d love to hear from you! Complete the form to send me an e-mail.</p>"; ?>
          
          <form method="post" action="<?php echo BASE_URL; ?>contact-process.php">
            
            <table>
              <tr>
                <th>
                    <label for="name">Name</label>
                </th>
                <td>
                    <input <?php echo isset($_SESSION['name']) ? "value=\"" . htmlspecialchars($_SESSION['name']) . "\"":""; ?> type="text" id="name" name="name" placeholder="Enter your name here...">
                </td>
              </tr>
              <tr>
                <th>
                    <label for="email">E-mail</label>
                </th>
                <td>
                    <input  <?php echo isset($_SESSION['email']) ? "value=\"" . htmlspecialchars($_SESSION['email']) . "\"":""; ?> type="text" id="email" name="email" placeholder="Enter e-mail address here...">
                </td>
              </tr>
              <tr>
                <th>
                    <label for="message">Message</label>
                </th>
                <td>
                    <textarea name="message" id="message" placeholder="Enter message here..."><?php echo isset($_SESSION['message']) ? htmlspecialchars($_SESSION['message']):""; ?></textarea>
                </td>
              </tr>
							<tr style="display: none;">
                <th>
                    <label for="address">Address</label>
                </th>
                <td>
                    <input type="text" id="address" name="address" placeholder="Enter address here...">
								    <p>Humans: don't fill out this form, it is to trick the robots.</p>
                </td>
              </tr>
            </table>
				<input type="submit" value="Submit">
				
			</form>
		</div>

	</div>

<?php include(ROOT_PATH . 'inc/footer.php') ?>
