/* Copyright (C) YOOtheme GmbH, YOOtheme Proprietary Use License (http://www.yootheme.com/license) */

jQuery(function($) {

	var config = $('html').data('config') || {};

	// Social buttons
	$('article[data-permalink]').socialButtons(config);
	
	// Таблицы
	/**
	 * Edited by ProjectSoft
	 * 13.06.2023 16:00
	 */
	$(".tm-content table").each(function(){
		// Если нет классов .table и .table-bordered
		let $table = $(this);
		if(!$table.hasClass('table') && !$table.hasClass('table-bordered')){
			// Очистим класс
			$table.attr('class', '');
			// Добавим классы
		   	$table.addClass('table');
			$table.addClass('table-bordered');
			// Удалим аттрибуты width, height, style
			$table.attr({
				'height': null,
				'width': null,
				'style': null
			})
			// Работа с элементами td, th
			$('td, th', $table).each(function(){
				let $thd = $(this);
				// Удалим аттрибуты width, height, style
				$thd.attr({
					'height': null,
					'width': null,
					'style': null
				});
			})
		}
	});
});
