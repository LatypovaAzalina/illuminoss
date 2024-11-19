// Объект фильтрации
let filter = {
	// Хранилище данных
	storage: [],
	// Сторона сортировки
	sort: false,
	// Запись товаров в хранилище
	products: function() {
		filter.storage = [];
		document.querySelectorAll("#products .col").forEach(elem => {
			filter.storage.push({
				"image": 	elem.querySelector("img").src,
				"name" : 	elem.querySelector("h3 a").innerHTML,
				"product_id": elem.querySelector("input[name=product_id]").value,
				"year" : 	elem.querySelector("input[name=year]").value,
				"category": elem.querySelector("input[name=category]").value,
			});
		});
	},
	// Запись заказов в хранилище
	orders: function() {
		filter.storage = [];
		document.querySelectorAll("#orders .col").forEach(elem => {
			let b = elem.querySelectorAll("b");
			filter.storage.push({
				"name"   : 	elem.querySelector("h2").innerHTML,
				"fio"    : 	b[0].innerHTML,
				"status" : 	b[1].innerHTML,
				"count"  : 	b[2].innerHTML,
				"reason" : 	(reason = elem.querySelector("p.reason")) ? reason.innerHTML : null,
				"order_id": elem.querySelector("input[name=order_id]").value,
				"timestamp": elem.querySelector(".text-small").innerHTML,
			});
		});
	},
	// Фильтрация данных по переданным параметрам
	filter: function(param, type) {
		let array = JSON.parse(JSON.stringify(filter.storage));
		
		if(type == "admin") {
			if(param != "all")
				array = array.filter(order => order.status == param);
			return filter.out(array, "orders");
		}


		filter.sort = !filter.sort;
		switch(type) {
			case "sort":
				if(filter.sort) array.sort((a, b) => (a[param] > b[param]) ? 1 : -1);
				else array.sort((a, b) => (a[param] < b[param]) ? 1 : -1);
			break;
			case "filter":
				category = document.getElementById("category").value;
				array = array.filter(product => product.category == category);
			break;
		}

		if(param == "all")
			array = JSON.parse(JSON.stringify(filter.storage));

		return filter.out(array, "products");
	},
	// Вывод отфильтрованных данных
	out: function(array, type) {
		let data = "";

		// Запись товаров
		if(type == "products") {
			array.forEach(product => {
				data += `
				<div class="col">
						<div class="cart">
		<div class="photo__cart">
<img src="${product.image}" alt="">

		<div class="text">
				<div class="nazvanie"><a href="product.php?id=${product.product_id}">${product.name}</a></div>
				<div class="h__f">
					<div class="time">2h 12m</div>
					<div class="rating">7.1</div>
					<div class="filt">Action</div>
				</div>
				</div>
			<button class="btn">+</button>
		</div>
			
		</div>
			<div class="cart__mini">
			
			<input type="hidden" value="${product.product_id}" name="product_id">
			<input type="hidden" value="${product.year}" name="year">
			<input type="hidden" value="${product.category}" name="category">
			</div>
	
				`;
				data += (role == "admin") ? `
						
							<p><a href="" class="text-small">Редактировать</a></p>
							<p><a href="" class="text-small">Удалить</a></p>
						` : '';
				data += (role != "guest") ? `<div class="cart__mini"><p class="text-right"><a href="controllers/add_cart.php?id=${product.product_id}" class="text-small">В избранное</a></p></div>` : '';
				data += `</div>`;
			});
		// Запись заказов
		} else if(type == "orders") {
			array.forEach(order => {
				if(order.status == "Подтверждённый") end = "";
				else end = (order.status == "Новый") ? `
					<form action="controllers/confirm_order.php" class="w100" method="POST">
						<input type="hidden" value="${ order.order_id }" name="id" />
						<button>Подтвердить заказ</button>
					</form>
					<h3 class="text-center">Отменить заказ</h3>
					<form action="controllers/cancel_order.php" class="w100" method="POST">
						<input type="hidden" value="${ order.order_id }'" name="id" />
						<textarea placeholder="Причина отмены" name="reason" required></textarea>
						<button style="margin:0">Отменить заказ</button>
					</form>
				` : `
					<h3 class="text-center">Причина отмены:</h3>
					<p class="reason">${ order.reason }</p>
				`;
				data += `
					<div class="col text-left">
						<h2>${ order.name }</h2>
						<p>Заказчик: <b>${ order.fio }</b></p>
						<p>Статус заказа: <b>${ order.status }</b></p>
						<p>Количество товаров: <b>${ order.count }</b></p>
						${ end }
						<p class="text-small text-right">${ order.timestamp }</p>
					</div>
				`;
			});
		} else return;

		if(!data)
			data = "<h3 class='text-center'>Данные отсутствуют</h3>";

		// Вывод записанных данных
		document.getElementById(type).innerHTML = data;
	}
}