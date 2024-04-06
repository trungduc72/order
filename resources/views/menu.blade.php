<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
								initial-scale=1.0">
    <title>Multi Step Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 500px;
            background-color: #ffffff;
            margin: 40px auto;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
        }

        .step {
            display: none;
        }

        .active {
            display: block;
        }

        input {
            padding: 15px 20px;
            width: 100%;
            font-size: 1em;
            border: 1px solid #e3e3e3;
            border-radius: 5px;
        }

        input:focus {
            border: 1px solid #009688;
            outline: 0;
        }

        .invalid {
            border: 1px solid #ffaba5;
        }

        #nextBtn,
        #prevBtn {
            background-color: #009688;
            color: #ffffff;
            border: none;
            padding: 13px 30px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            flex: 1;
            margin-top: 5px;
            transition: background-color 0.3s ease;
        }

        #prevBtn {
            background-color: #ffffff;
            color: #009688;
            border: 1px solid #009688;
        }

        #prevBtn:hover,
        #nextBtn:hover {
            background-color: #00796b;
            color: #ffffff;
        }

        .progress {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="progress">
            <div class="progress-bar
						progress-bar-striped bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="step active">
            <p class="text-center mb-4">Step 1</p>
            <div class="mb-3">
                <!-- <input type="text" placeholder="Field 1" oninput="this.className = ''" name="field1"> -->

                <div class="mb-3">
                    <label class="mb-3" class="form-label">Please select a meal</label>
                    <select id="meal" name="meal" class="form-select" aria-label="Default select example">
                        <option selected>Select a meal</option>
                        <option value="breakfast">Breakfast</option>
                        <option value="lunch">Lunch</option>
                        <option value="dinner">Dinner</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="mb-3" class="form-label">Please enter number of people</label>
                    <input id="numberPeople" name="numberPeople" type="number" class="form-control" min="1" max="10" oninput="this.className = ''">
                </div>
            </div>
        </div>

        <div class="step">
            <p class="text-center mb-4">Step 2</p>
            <div class="mb-3">
                <div class="mb-3">
                    <label class="mb-3" class="form-label">Please select a restaurant</label>
                    <select id="restaurant" name="restaurant" class="form-select" aria-label="Default select example">
                        <option selected>Select a restaurant</option>
                        <option value="mcdonalds">Mc Donalds</option>
                        <option value="tacobell">Taco Bell</option>
                        <option value="bbqhut">BBQ Hut</option>
                        <option value="vegedeli">Vege Deli</option>
                        <option value="pizzeria">Pizzeria</option>
                        <option value="pandaexpress">Panda Express</option>
                        <option value="olivegarden">Olive Garden</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="step">
            <p class="text-center mb-4">Step 3</p>
            <div class="mb-3 d-flex lineDish" style="gap: 10px;">
                <div class="mb-3 col-6">
                    <label class="mb-3" class="form-label">Please select a dish</label>
                    <select id="dish" name="dish" class="form-select dish" aria-label="Default select example">
                        <option>Select a Dish</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label class="mb-3" class="form-label">Please enter no. of servings</label>
                    <input id="numberServings" name="numberServings" type="number" class="form-control" min="1" oninput="this.className = ''" style="width: 100px;">
                </div>
            </div>

            <div class="mb-3 lineDish" id="inputFields"></div>
            <button id="rowAdder" class="btn btn-success">Add</button>
        </div>

        <div class="step">
            <p class="text-center mb-4">Review</p>
            <div class="mb-3 d-flex" style="gap: 10px;">
                <div class="mb-3 col-6">
                    <label class="mb-3" class="form-label">Meal</label>
                </div>
                <div class="mb-3 col-6">
                    <label id="rMeal" class="mb-3" class="form-label"></label>
                </div>
            </div>
            <div class="mb-3 d-flex" style="gap: 10px;">
                <div class="mb-3 col-6">
                    <label class="mb-3" class="form-label">No of people</label>
                </div>
                <div class="mb-3 col-6">
                    <label id="rNumberPeople" class="mb-3" class="form-label"></label>
                </div>
            </div>
            <div class="mb-3 d-flex" style="gap: 10px;">
                <div class="mb-3 col-6">
                    <label class="mb-3" class="form-label">Restaurant</label>
                </div>
                <div class="mb-3 col-6">
                    <label id="rRestaurant" class="mb-3" class="form-label"></label>
                </div>
            </div>
            <div class="mb-3 d-flex" style="gap: 10px;">
                <div class="mb-3 col-6">
                    <label class="mb-3" class="form-label">Dishes</label>
                </div>
                <div class="mb-3 col-6 d-flex">
                    <label id="rDish" class="mb-3" class="form-label"></label>-
                    <label id="rNumberServings" class="mb-3" class="form-label"></label>
                </div>
            </div>
        </div>

        <div class="form-footer d-flex" style="gap: 10px;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        //xử lí show tab
        let currentTab = 0;
        showTab(currentTab);

        function showTab(n) {
            let x = document.getElementsByClassName("step");
            x[n].style.display = "block";
            let progress = (n / (x.length - 1)) * 100;
            document.querySelector(".progress-bar")
                .style.width = progress + "%";
            document.querySelector(".progress-bar")
                .setAttribute("aria-valuenow", progress);
            document.getElementById("prevBtn")
                .style.display = n == 0 ? "none" : "inline";
            document.getElementById("nextBtn")
                .innerHTML = n == x.length - 1 ? "Submit" : "Next";
        }

        function nextPrev(n) {
            let x = document.getElementsByClassName("step");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab += n;
            if (currentTab >= x.length) {
                resetForm();
                return false;
            }
            showTab(currentTab);
        }

        function validateForm() {
            let valid = true;
            let x = document.getElementsByClassName("step");
            let y = x[currentTab].getElementsByTagName("input");
            for (var i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
            }
            return valid;
        }

        function resetForm() {
            let x = document.getElementsByClassName("step");
            for (var i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            let inputs = document.querySelectorAll("input");
            inputs.forEach(input => {
                input.value = "";
                input.className = "";
            });
            currentTab = 0;
            showTab(currentTab);
            document.querySelector(".progress-bar")
                .style.width = "0%";
            document.querySelector(".progress-bar")
                .setAttribute("aria-valuenow", 0);
            document.getElementById("prevBtn")
                .style.display = "none";
        }

        //xử lí chọn món
        var selectMeal = document.getElementById('meal');
        var selectRestaurant = document.getElementById('restaurant');
        selectRestaurant.addEventListener('change', function() {
            var arr = [];
            arr.push(selectMeal.value);
            arr.push(selectRestaurant.value);
            console.log('Selected value:', arr);

            axios.post('/menu', {
                    data: arr
                })
                .then(function(response) {
                    // console.log(response.data.dishes);

                    var arrDishes = response.data.dishes
                    var selects = document.querySelectorAll("select.dish");
                    selects.forEach(function(select) {
                        arrDishes.forEach(element => {
    
                            var option = document.createElement("option");
                            option.text = element.name;
                            option.value = element.name;    
    
                            select.appendChild(option);
                        });
                    });
                })
                .catch(function(error) {
                    console.log(error);
                });

        });

        $("#rowAdder").click(function() {
            newRowAdd =
                `<div id="row" class="mb-3 d-flex" style="gap: 10px;">
                <div class="mb-3 col-6">
                    <select id="dish" name="dish" class="form-select dish" aria-label="Default select example">
                        <option>Select a Dish</option>
                    </select>
                </div>
                <div class="mb-3 col-6 d-flex" style="justify-content: space-between;">
                    <input id="numberServings" name="numberServings" type="number" class="form-control" min="1" oninput="this.className = ''" style="width: 100px;">
                    <button class="btn btn-danger"
                                        id="DeleteRow"
                                        type="button">
                                    Delete
                                </button>
                </div>
            </div>`;

            $('#inputFields').append(newRowAdd);
        });

        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#row").remove();
        })

        //xử lí hiển thị
        var submit = document.getElementById("nextBtn")
        submit.addEventListener('click', function() {
            document.getElementById('rMeal').innerHTML = document.getElementById('meal').value
            document.getElementById('rNumberPeople').innerHTML = document.getElementById('numberPeople').value
            document.getElementById('rRestaurant').innerHTML = document.getElementById('restaurant').value

            var divs = document.querySelectorAll('.lineTable');
            divs.forEach(function(div) {
                var select = div.querySelector('select');
                var input = div.querySelector('input');

                // Lấy giá trị của select và input
                var selectValue = select ? select.value : null;
                var inputValue = input ? input.value : null;

                // Đưa giá trị vào mảng values
                if (selectValue !== null) {
                    values.push(selectValue);
                }
                if (inputValue !== null) {
                    values.push(inputValue);
                }
            });
            document.getElementById('rDish').innerHTML = document.getElementById('dish').value
            document.getElementById('rNumberServings').innerHTML = document.getElementById('numberServings').value
        });
    </script>

</body>

</html>