<?php 
/**
 * Class Object
 * @property int $id
 */
abstract class Object{
	 /** @var  PDO */
	static $db;
    protected $attributes = [];

	public function __construct( $params = [])
    {

        foreach ($params as $param_name => $param_value){
            if (property_exists(static::class, $param_name ))
                $this->$param_name = $param_value;
            else{
                $sFuncName = 'set'.ucfirst($param_name);
                //if (method_exists($this,$sFuncName ))
                    $this->$sFuncName($param_value);
            }
        }
    }

    public function __get($name)
    {
        $sFuncName = 'get'.ucfirst($name);
        if (method_exists($this,$sFuncName))
            return $this->$sFuncName();

        return null;
    }

    public function __set($name,$value)
    {
        $sFuncName = 'set'.ucfirst($name);
        if (method_exists($this,$sFuncName))
            $this->$sFuncName($value);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return isset($this->attributes['id'])? $this->attributes['id'] : null;
    }


    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->attributes['id'] = $id;
        return $this;

    }

    static function TableName(){

        return strtolower(static::class);
    }

    /**
     * @param integer $id
     * @return static
     */
    public static function findById($id){

        $table = static::TableName();

        $oQuery = Object::$db->prepare("SELECT * FROM {$table} WHERE id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        return $aRes? new static($aRes):null;
    }

    public static function findLineByCategory($what, $toWhich){

        $table = static::TableName();

        $oQuery = Object::$db->prepare("SELECT * FROM {$table} WHERE $what=:need_what");
        $oQuery->execute(['need_what' => $toWhich]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        return $aRes? new static($aRes):null;
    }

    public static function getListByCategory($category, $what, $toWhich){

        $table = static::TableName();

        $oQuery = Object::$db->prepare("SELECT $category FROM {$table} WHERE $what=:need_what");
        $oQuery->execute(['need_what' => $toWhich]);
        $aRes = $oQuery->fetchAll(PDO::FETCH_COLUMN);

        return count($aRes)>1? $aRes : $aRes[0];
    }

    public static function getListObjectByCategory ($category, $what, $toWhich){

       $aRes = static::getListByCategory($category, $what, $toWhich);
        
        if (count($aRes) > 1){
            foreach ($aRes as $value) { 
                $results[] = new static(static::findLineByCategory($category, $value));
            } 
        } elseif (count($aRes) == 0) {
            return null;
        } else {
            $results[] = new static(static::findLineByCategory($category, $aRes));
        }

        return $results;
    }

    protected function insert(){
        $table = static::TableName();
        $aLabels = [];
        $aValues = [];

        foreach ( $this->attributes as $name => $value){
            $aLabels[] = $name;
            $aValues[] = ':'.$name;
        }

        $sLabels = implode(',',$aLabels);
        $sValues = implode(',',$aValues);

        $query = self::$db->prepare("INSERT INTO  {$table} ({$sLabels}) VALUES ($sValues) ");
        $query->execute($this->attributes);

        if ($iId = self::$db->lastInsertId())
            $this->setId($iId);
    }

    protected function update(){
        $table = static::TableName();
        $aUpdates = [];

        foreach ( $this->attributes as $name => $value){
            if ($name == 'id') continue;
            $aUpdates[] = $name.'=:'.$name;
        }

        $sUpdates = implode(', ',$aUpdates);

        $query = self::$db->prepare("UPDATE  {$table} SET {$sUpdates} WHERE id=:id");
        $query->execute($this->attributes);
    }

    public function save(){
        if ($this->id)
            $this->update();
        else
            $this->insert();
    }

    public function __call($methodName, $params)
    {
    	$methodPrefix = substr($methodName, 0, 3);
        $name = lcfirst(substr($methodName, 3));

        if ($methodPrefix == 'set')
        {
            $this->attributes[$name] = $params[0];

            return $this;

        }
        elseif ($methodPrefix == 'get')
        {	
            return isset($this->attributes[$name])? $this->attributes[$name] : null;
        }
        return null;
       
    }

}
    /**   
     * @var int $idBrend 
     * @var int $idBodyAuto  
     * @var int $idTransmission 
     * @var string $nameModel  
     */ 

	class ModelAuto extends Object {

    }

    /**   
     * @var int $idPrice 
     * @var int $priceDeposit  
     */ 

	class Deposit extends Object {

	}

	 /**   
     * @var string $nameBrend 
     */ 

	class BrendAuto extends Object {

	}

	 /**   
     * @var string $type 
     */ 

	class Transmission extends Object {

	}

	/**   
     * @var string $typeBodyAuto 
     */ 

	class BodyAuto extends Object {

	}

	/**   
     * @var int $idModel 
     * @var string $nameOptions 
     * @var int $price 
     * @var string $description 
     */ 

	class AdditionalOption extends Object {

	}

	/**   
     * @var int $percent 
     * @var int $idModel 
     * @var string $description 
     */ 

	class Discount extends Object {

	}

	/**   
     * @var int $idModel 
     * @var int $stateNumber 
     * @var string $status 
     * @var string $description 
     */ 

	class Auto extends Object {

		public function StatusAdd($rentalDate, $returnDate) {
			//вычисляем занята или свободна машинка в зависимости от даты 
			//возврата авто из договора, а также даты окончания страховки и даты окончания ТО

            $oInsuranceAuto = InsuranceAuto::findLineByCategory('idAuto', $this->getId());
            $aReturnDateByRContract = RentalContract::getListByCategory('returnDate','idAuto', $this->id);

            $status = ($returnDate < $oInsuranceAuto->getDateInsEnd() 
                        && $returnDate < $oInsuranceAuto->getDateToEnd() 
                        && $returnDate > max($aReturnDateByRContract))? 'арендована' : 'свободна';
            
            return static::setStatus($status);

		}
	}

	/**   
     * @var int $idAuto 
     * @var string $imgAuto 
     */ 

	class ImageAuto extends Object {

	}

	/**   
     * @var int $numberInsPolicy 
     * @var string $dateInsEnd 
     * @var string $dateToEnd 
     * @var int $idAuto 
     * @var string $dateInsEnd 
     */ 

	class InsuranceAuto extends Object {

	}

	/**   
     * @var int $idClient 
     * @var string $conclusionDate 
     * @var string $receiptAutoDate 
     * @var string $receiptAutoTime 
     * @var string $placeReceipt 
     * @var string $returnDate 
     * @var string $returnTime 
     * @var string $placeReturn 
     * @var int $summ 
     */ 

	class RentalContract extends Object {

		public $idAuto;
		public $receiptAutoDate;
		public $returnDate;
		public $summ;


		public function SummAdd() {
			//вычисление итоговой суммы исходя из стоимости авто, залога, 
			//а также выбранных дополнительных опций, скидки
			//Переписать исходя из новых классов

            $oModelAuto = ModelAuto::findById(Auto::getListByCategory('idModel', 'id', $this->idAuto));
            $oDiscount = Discount::findLineByCategory('idModel', $oModelAuto->getId());
            $aIdOption = SelectedOption::getListByCategory('idOption','idRcontract',$this->id);

            for ($i = 0; $i < count($aIdOption); $i++){
                $summ += AdditionalOption::findLineByCategory('id', $aIdOption[$i])->getPrice();
            }

			$count = (strtotime($this->returnDate) - strtotime($this->receiptAutoDate))/86400;

			$summ += $count * $oModelAuto->getPrice();
            $summ *= (100 - $oDiscount->getPercent())/100;
            $summ += Deposit::getListByCategory('priceDeposit','idModel', $oModelAuto->getId());

            return static::setSumm($summ);
			
		}
	}

	/**   
     * @var string $name 
     * @var string $surname 
     * @var string $patronymic 
     * @var int $numberDriverLicense 
     * @var string $dateDriverLicense 
     * @var int $phoneNumber 
     * @var int $passportID 
     * @var int $passportSeries 
     * @var string $passportIssuedBy 
     * @var string $dob 
     * @var string $regAddress 
     */ 

	class Client extends Object {

	}

	/**    
     * @var int $idRcontract 
     * @var int $idOption 
     */ 

	class SelectedOption extends Object {

	}

	/**    
     * @var int $idRcontract 
     * @var string $dateAct 
     * @var int $sumFinesGibdd
     * @var int $sumFines
     */ 

	class ActPP extends Object {

		public $idRcontract;
		public $dateAct;
		public $sumFinesGibdd;

		public function sumFinesAdd() {
			//сумма складывается из штрафов за гибдд и из штрафа за нарушение срока
			//который свою очередь вычисляется след образом: высчитывается продолжительность задержки авто
			//(дата возврата авто по договору - дата акта возврата авто) и умножается на стоимость авто в день
			$oRentalContract = RentalContract::findById($this->idRcontract);
			$oModelAuto = ModelAuto::findById((Auto::findById($oRentalContract->idAuto))->getIdModel());

			$count = (strtotime($this->dateAct) - strtotime($oRentalContract->receiptAutoDate))/86400;
			$sumFines = $count > 0 ? $count * ($oModelAuto->getPrice()) : 0;
			$sumFines+=$this->sumFinesGibdd;

            return static::setSumFines($sumFines);
		}
	}

	/**    
     * @var string $pageTitle 
     * @var string $text 
     */ 
	
	class Pages extends Object {

	}

	/**    
     * @var string $userName 
     * @var string $titleReviews
     * @var string $text 
     * @var string $date
     * @var string $time 
     * @var string $email
     */ 
	
	class Reviews extends Object {
    	
	}