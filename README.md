# Тестовое задание Laptop.ru

## ComplexNumber - класс комплексного числа
## ComplexArray - класс для хранения и итераций ComplexNumber
## ComplexAction - класс для работы с комплексными числами (ComplexArray)

### ComplexNumber:
- Создать экземпляр либо через конструктор (подавать на вход строку типа '2i + 1', '-111 - 22i' и тд), либо с помощью статичного метода createFromNumbers (первое число - мнимое);
- Получить число get();
- Вывод комплексного числа на странице через echo и экземпляр.

### ComplexArray:
- Добавить элемент в массив add(ComplexNumber);
- Удалить элемент remove($index);
- Получить длину length();
- Получить по индексу элемент get($index);

### ComplexAction:
- Сумма комплексного массива sum(ComplexArray);
- Разность комплексного массива minus(ComplexArray);
- Умножение комплексного массива multiply(ComplexArray);
- Деление комплексного массива division(ComplexArray);


___
## P.S. Многое не учтено, но должно работать
