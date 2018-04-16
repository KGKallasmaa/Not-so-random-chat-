<!DOCTYPE html>
<div class="footer">
		<a href='<?php echo base_url();?>index.php/Pages/about'><?php echo lang("about"); ?></a>
		<a href="<?php echo base_url();?>index.php/Pages/tos"><?php echo lang("terms"); ?></a>
		<a href="<?php echo base_url();?>index.php/Pages/stat"><?php echo lang("statistic"); ?></a>

        <p>The Current time is:</p>
        <p id="currenttime"></p>

        <script>
            var display=setInterval(function(){Time()},0);

            function Time() {
                var date=new Date();
                var time=date.toLocaleTimeString();
                document.getElementById("currenttime").innerHTML=time;
            }
        </script>
	</div>

</div>

</body>

</html>