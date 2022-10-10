function calculate() {
    var number1 = Number($("#number1").val());
    var number2 = Number($("#number2").val());
    var result;
    switch($("#action option:selected").text()) {
        case "+":
            result = number1 + number2;
            break;
        case "-":
            result = number1 - number2;
            break;
        case "*":
            result = number1 * number2;
            break;
        case "/":
            if(number2 != 0) {
                result = number1 / number2;
            }
            else {
                result = "Деление на ноль";
            }
            break;
    }
	$("#result").html(result);
    $("#result2").html(result);
}