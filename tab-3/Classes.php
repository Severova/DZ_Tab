<?php

class TaskManager{
    /** @var TaskPrototype[]  */
    private $aTasks = [];

    /**
     * @var null|TaskPrototype
     */
    public $oCurrentTask = null;

    private $sConfigTasks = [
        [
            'title' => 'Сумма чисел',
            'description' => 'Посчитать сумму двух чисел',
            'class' => TaskSumm::class
        ],
        [
            'title' => 'Разность чисел',
            'description' => 'Посчитать разность двух чисел',
            'class' => TaskDiff::class
        ],
        [
            'title' => 'Произведение чисел',
            'description' => 'Посчитать произведение двух чисел',
            'class' => TaskMult::class
        ],
        [
            'title' => 'Частное чисел',
            'description' => 'Посчитать частное двух чисел',
            'class' => TaskDivis::class
        ],
        [
            'title' => 'Факториал числа n',
            'description' => 'Вычислить n!',
            'class' => TaskFact::class
        ],
        [
            'title' => 'Числа Фибоначчи',
            'description' => 'Вывести n-ый элемент числовой последовательности Фибоначчи',
            'class' => TaskFibonacci::class
        ],
        [
            'title' => 'Генерация массива',
            'description' => 'Сгенерировать одномерный массив из случайных n элементов',
            'class' => TaskArray::class
        ],

        [
            'title' => 'Изменение массива',
            'description' => 'Сгенерировать одномерный массив из случайных n элементов. Вывести исходный массив. Вывести отдельно четные и нечетные элементы массива',
            'class' => TaskArrayEvenOdd::class
        ],
        [
            'title' => 'Сортировка массива. Пузырек',
            'description' => 'Сгенерировать случайный массив. Вывести изначальный массив, отсортировать его <a href="https://ru.wikipedia.org/wiki/%D0%A1%D0%BE%D1%80%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0_%D0%BF%D1%83%D0%B7%D1%8B%D1%80%D1%8C%D0%BA%D0%BE%D0%BC">пузырьком</a>',
            'class' => TaskBubbles::class
        ],
        [
            'title' => 'Сортировка массива. Шейкер',
            'description' => 'Сгенерировать случайный массив. Вывести изначальный массив, отсортировать его <a href="https://ru.wikipedia.org/wiki/%D0%A1%D0%BE%D1%80%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0_%D0%BF%D0%B5%D1%80%D0%B5%D0%BC%D0%B5%D1%88%D0%B8%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5%D0%BC">перемешиванием</a>',
            'class' => TaskCocktail::class
        ]

    ];

    function __construct()
    {
        $iTask = isset($_GET['task'])? $_GET['task'] : false;
        foreach ($this->sConfigTasks as $key => $item) {
            if (isset($item['class']) && class_exists($item['class'])) {
                $this->aTasks[$key+1] = new $item['class'] (array_merge($item,['number' => $key+1]));
            }
            else{
                $this->aTasks[$key+1] = new TaskExample(array_merge($item,['number' => $key+1]));
            }
        }

        if ( $iTask && isset($this->aTasks[$iTask]) ) $this->oCurrentTask = $this->aTasks[$iTask];
    }

    public function buildMenu(){
        foreach ($this->aTasks as $oTask){
            echo
            "<div>
                <p>Задание №{$oTask->number}.<a href='/tab-3/?task={$oTask->number}'> {$oTask->title}</a></p>
            </div>";
        }
    }

    public function buildResult(){
        echo "<div>";

        echo "<p>Задание №{$this->oCurrentTask->number}. {$this->oCurrentTask->title} <a href='/tab-3/'>Назад к списку</a></p>";
        echo "<p>Описание: {$this->oCurrentTask->description}</p>";
        echo "<p>Результат: </p>";
       foreach ( $this->oCurrentTask->func() as $sMessage){
            echo "<p> {$sMessage} </p>";
       }
       echo "</div>";
    }

}

abstract class  TaskPrototype
{
    public $title;
    public $number;
    public $description;

    public function __construct($params = [])
    {
        foreach ($params as $key => $value){
            if (property_exists(self::class,$key))
                $this->$key = $value;
        }

    }

    /**
     * @return string[]
     */
    abstract public function func();
}

class TaskExample extends TaskPrototype{
    public function func()
    {
        return ['Необходимо создать нужный класс с необходимыми функциями'];
    }

}

class TaskSumm extends TaskPrototype{

    public $x1 = 1;
    public $x2 = 100;

    private function summ($x1,$x2){
        return $x1+$x2;
    }

    public function func()
    {
        $out[] = "Число x1={$this->x1}";
        $out[] = "Число x2={$this->x2}";
        $out[] = "x1+x2={$this->summ($this->x1,$this->x2)}";

        return $out;
    }

}

class TaskDiff extends TaskPrototype{

    public $x1 = 100;
    public $x2 = 35;

    private function diff($x1,$x2){
        return $x1-$x2;
    }

    public function func(){
        $out[] = "Число x1={$this->x1}";
        $out[] = "Число x2={$this->x2}";
        $out[] = "x1-x2={$this->diff($this->x1,$this->x2)}";

        return $out;
    }

}

class TaskMult extends TaskPrototype{

    public $x1 = 10;
    public $x2 = 35;

    private function mult($x1, $x2){
        return $x1 * $x2;
    }

    public function func(){
        $out[] = "Число x1={$this->x1}";
        $out[] = "Число x2={$this->x2}";
        $out[] = "x1*x2={$this->mult($this->x1, $this->x2)}";

        return $out;
    }
}

class TaskDivis extends TaskPrototype{

    public $x1 = 100;
    public $x2 = 10;

    private function divis($x1, $x2){
        return $x2 !== 0 ? $x1 / $x2 : false; 
    }

    public function func(){
        $out[] = "Число x1={$this->x1}";
        $out[] = "Число x2={$this->x2}";
        $out[] = "x1/x2=". ($this->divis($this->x1, $this->x2) ?: "Ошибка! На '0' делить нельзя!");

        return $out;
    }
}

class TaskFact extends TaskPrototype{

    public $n = 5;

    private function fact($n){
        if ($n === 0) {
            return 1;
        } else {
            for ($i = 1, $factorial = 1; $i <= $n; $factorial *= $i, $i++);
            
            return $factorial;
        }
    }

    public function func(){
        $out[] = "Число n={$this->n}";
        $out[] = "n!={$this->fact($this->n)}";

        return $out;
    }
}

class TaskFibonacci extends TaskPrototype{

    public $n = 7 ;

    private function fibonacci($n){
        for ($i = 0, $k = 1; $j < $n; $i += $k, $k = $i - $k, $j++);
        
        return  $i;
    }

    public function func(){
        $out[] = "Число n={$this->n}";
        $out[] = "n={$this->fibonacci($this->n)}";

        return $out;
    }
}

class TaskArray extends TaskPrototype{

    public $n = 7 ;

     protected function array($n){
        $arr = [];

        for ($i = 0; $i < $n; $i++){
            $arr[] = rand(0,500);
        }
        
        return $arr;
    }

    public function func(){
       return $this->array($this->n);
    }
}

class TaskArrayEvenOdd extends TaskArray{

    public $n = 10;

    private function evenOdd($mas){
        $odd = [];
        $even = [];

        foreach ($mas as $value) {
            ($value % 2) ? $odd[] = $value : $even[] = $value;
        }
        
        $evOdd[] = $even;
        $evOdd[] = $odd;
        
        return  $evOdd;
    }
    public function func(){
        $arr = $this->array($this->n);
        $evOdd = $this->evenOdd($arr);
        
        $out[] = "Исходный массив: ". implode ( ', ' ,  $arr);
        $out[] = "Четные: ". implode ( ', ' , $evOdd[0]);
        $out[] = "Нечетные: ". implode ( ', ' , $evOdd[1]);
        
        return $out;
    }
}

class TaskBubbles extends TaskArray{

    public $n = 10;
    protected function bubblesAlg(&$a, &$b){
        if ($a > $b) {
            $a = $a + $b - ($b = $a);
        }
        //return [$a, $b];
    }
    private function bubbles($mas, $n){
       for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                $this->bubblesAlg($mas[$i], $mas[$j]);

                //решение без использования жестких ссылок (нужно также убрать в функции знак & и раск return)
                //$mass=$this->bubblesAlg($mas[$i], $mas[$j]);
                //$mas[$i]=$mass[0];
                //$mas[$j]=$mass[1];

                //решение без использования функции:
                //if ($mas[$i] > $mas[$j]) {
                //   $mas[$i] = $mas[$i] + $mas[$j] - ($mas[$j] = $mas[$i]);
                //}
            }
        }

        return $mas;
    }

    public function func(){
        $arr = $this->array($this->n);

        $out[] = "Исходный массив: ". implode ( ', ' ,  $arr);
        $out[] = "Отсортированный массив: ". implode ( ', ' , $this->bubbles($arr, $this->n));

        return $out;
    }
}

class TaskCocktail extends TaskBubbles{

    public $n = 10 ;
    
    private function cocktail($mas){
        $first = 0; 
        $last = count($mas);

        while ($last > $first) { 

            for ($i = $first; $i < $last - 1; $i++) {   
                $this->bubblesAlg($mas[$i], $mas[$i+1]);

                //решение без использования жестких ссылок

                //$mass=$this->bubblesAlg($mas[$i], $mas[$i+1]);
                //$mas[$i]=$mass[0];
                //$mas[$i+1]=$mass[1];

            }

            $last--; 

            for ($i = $last - 1; $i > $first; $i--) { 
                $this->bubblesAlg($mas[$i-1], $mas[$i]);

                //решение без использования жестких ссылок

                //$mass=$this->bubblesAlg($mas[$i-1], $mas[$i]);
                //$mas[$i-1]=$mass[0];
                //$mas[$i]=$mass[1];
            }

            $first++; 
        } 
        
        return $mas;
    }

    public function func(){
        $arr = $this->array($this->n);

        $out[] = "Исходный массив: ". implode ( ', ' ,  $arr);
        $out[] = "Отсортированный массив: ". implode ( ', ' , $this->cocktail($arr, $this->n));

        return $out;
    }
}