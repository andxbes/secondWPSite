
<?php
/*
 * Template name: Главная страница  
 */

get_header();
?>


<div id="firstBlock" class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="text-center" >
				<?= getField( 'oboutheader' ); ?>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class= "text-center col-md-6 col-md-offset-3">
			<p><?= getField( 'obouttext' ); ?></p>
			<a class="glassy-button" href="<?= getField( 'oboutlink' ); ?>"> Подробнее </a>
		</div>
	</div>

</div>


<div id="secondBlock" class="container">
	<!--работы-->
	<?php for ( $i = 0; $i < 4; $i++ ): ?>
		<div class='col-md-3 col-sm-6 col-xs-12'>
			<div class='pic'>

			</div>
			<h3>Дизайн</h3>
			<p class="info">
				Gkdfg sffgergeg erg erger 
				regerge zvscfvergerwexwe 
				ewfcwfxwfwxfefx regerge 
			</p>
			<a class='aquamarineButton'>Подробнее</a>

		</div>
	<?php endfor; ?>
</div>

<div id='thirdBlock' class='container text-center' >

	<h2 class="title">Мое портфолио</h2>
	<?php $array = getFieldsAsArray( "portfolio" ); ?>
	<?php for ( $i = 0; ($i < 6) && ($i < count( $array )); $i++ ): ?>
		<?php $post = $array[$i]['post']; ?>
		<div class='col-md-4 col-sm-6 col-xs-12'>
			<div class="picPort">
				<a href='<?= get_permalink( $post ) ?>'><?= get_the_post_thumbnail( $post, "medium" ) ?></a>
			</div>
		</div>
	<?php endfor; ?>

	<div class='col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3'>
		<a class='aquamarineButton' href="<?= getField( 'porfoliolink' ) ?>">Посмотреть все</a>
	</div>


</div>


<div id='fourthdBlock' class='container text-center' >

	<h2 class="title">Наша команда</h2>

	<?php $arrEmpl = getFieldsAsArray( "persone_list" ); ?>
	<?php for ( $i = 0; ($i < 4) && ($i < count( $arrEmpl )); $i++ ): ?>
		<?php $postEmpl = get_post( $arrEmpl[$i]['person'] ); ?>
		<div class='col-md-3 col-sm-6 col-xs-12'>
			<div class='pic'>
				<a href="<?= get_permalink( $postEmpl->ID ) ?>">
					<?= get_the_post_thumbnail( $postEmpl->ID, "thumbnail" ) ?>
				</a>
			</div>
			<h3><?= $postEmpl->post_title ?></h3>
			<p><?php
				$taxs = get_the_terms( $postEmpl->ID, "position" );
				if ( !empty( $taxs ) ) {
					foreach ( $taxs as $tax ) {
						echo "$tax->name <br/>";
					}
				}
				?></p>
			<p class="info">
				<?= $postEmpl->post_content ?>
			</p>

		</div>
	<?php endfor; ?>

</div>


<div id='fifthdBlock' class='container text-center' >

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <?php $massages =  getMassages(10);
		      $isFirst = true;
		?>
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php foreach( $massages as $message): ?>

				<div class="item <?= $isFirst ? "active" : "" ?>">
					<div class="item active text-center">
						<h2 class="title">Отзывы клиентов</h2>
						<div class="col-md-6 col-md-offset-3">
							<p>
									<?=isset($message->text)?$message->text: "Нет записей" ?><br/>
									<?=isset($message->date)?$message->date: "Нет записей"?>
							</p>
							<h3 class="name"><?=isset($message->name)?$message->name: "Нет записей"?></h3>
						</div>


					</div>
				</div>
             
			<?php
			$isFirst = false;
			endforeach; ?>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


</div>

<div id='sixthdBlock' class='container text-center' >
	<div class="col-md-4 col-md-offset-1 text-left">
		<h2 class="title">Контакты</h2>
		<h3> <?= getField( 'header' ); ?> </h3>
		<p>
			<?= getField( 'contactstext' ); ?>
		</p>
		<p  class="contacts">
			<?= getField( 'contactname' ); ?>
		</p>
		<p  class="contacts">
			<?= getField( 'phone' ); ?>
		</p>
		<p  class="contacts">
			<?= getField( 'email' ); ?>
		</p>
	</div>

	<div class="col-md-6 col-md-offset-1">
		<form action="#"  role="form">
			<div class="form-group userField">
				<div  class=" col-md-6 col-xs-6" >
					<input type="email" id="email" name="email" class="form-control " placeholder="EMAIL" required aria-describedby="email">
				</div>
				<div  class=" col-md-6 col-xs-6" >
					<input name="name" id="name"  type="text" class="form-control" placeholder="NAME" aria-describedby="username" required>
				</div>
			</div>
			<div class="form-group sendGroup">
				<div class="col-md-12 col-xs-12">
					<textarea class="form-control" id="text" name="text" aria-describedby="message" placeholder="Сообщение" required ></textarea>
				</div>
				<div class="col-md-4 col-md-offset-8 col-sm-4 col-sm-offset-8  col-xs-6 col-xs-offset-6 ">
					<input type="button" id="submitButton" class="btn  form-control  aquamarineButton" value="Отправить">
				</div>

			</div>
		</form>
	</div>

</div>


<script>  var admin_ajax = '<?= admin_url( 'admin-ajax.php' ) ?>';</script>
<div id="modal_form"><!-- модальное oкнo --> 
	<span id="modal_close">X</span> <!-- Кнoпкa зaкрыть --> 
	<div class="cont">
		<p id="messageField"></p>
	</div>
</div>
<div id="overlay"></div><!-- Пoдлoжкa -->
<?php
get_footer();

