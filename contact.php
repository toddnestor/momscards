<?php
session_start();
$pageTitle = "Contact Mike";
$section = "contact";
include('inc/header.php'); ?>

	<div class="section page">

		<div class="wrapper">
		
		
			<h1>Contact</h1>
			
			<?php	echo isset($_GET['sent']) ? "<h2 class=\"message-sent\">Your message was sent!</h2>":""; ?>
			<?php	echo isset($_GET['error']) ? "<h2 class=\"message-sent\">You must fill out the complete form to submit a message!</h2>":""; ?>
        
          <p>I&rsquo;d love to hear from you! Complete the form to send me an e-mail.</p>
          
          <form method="post" action="contact-process.php">
            
            <table>
              <tr>
                <th>
                    <label for="name">Name</label>
                </th>
                <td>
                    <input <?php echo isset($_SESSION['name']) ? "value=\"" . $_SESSION['name'] . "\"":""; ?> type="text" id="name" name="name" placeholder="Enter your name here...">
                </td>
              </tr>
              <tr>
                <th>
                    <label for="email">E-mail</label>
                </th>
                <td>
                    <input  <?php echo isset($_SESSION['email']) ? "value=\"" . $_SESSION['email'] . "\"":""; ?> type="text" id="email" name="email" placeholder="Enter e-mail address here...">
                </td>
              </tr>
              <tr>
                <th>
                    <label for="message">Message</label>
                </th>
                <td>
                    <textarea name="message" id="message" placeholder="Enter message here..."><?php echo isset($_SESSION['message']) ? $_SESSION['message']:""; ?></textarea>
                </td>
              </tr>
            </table>
				<input type="submit" value="Submit">
				
			</form>
		</div>

	</div>

<?php include('inc/footer.php') ?>
