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

        return static::class;
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
        	$value = $params[0];
            $this->attributes[$name] = $value;

            return $this;

        }
        elseif ($methodPrefix == 'get')
        {	
            return isset($this->attributes[$name])? $this->attributes[$name] : null;
        }
       
    }

}

	class ModelAuto extends Object {
		/*protected $idModel;
		protected $idBrend;
		protected $idBodyAuto;
		protected $idTransmission;
		protected $nameModel;*/


    }

	class Deposit extends Object {

		/*protected $idDeposit;
		protected $idPrise;
		protected $priseDeposit;*/
	}

	class PriseModel extends Object {

		/*protected $idPrise;
		protected $idModel;
		protected $prise;*/
	}


	class BrendAuto extends Object {

		/*protected $idBrend;
		protected $nameBrend;*/
	}

	class Transmission extends Object {

		/*protected $idTransmission;
		protected $type;*/
	}

	class BodyAuto extends Object {

		/*protected $idBodyAuto;
		protected $typeBodyAuto;*/

	}

	class AdditionalOption extends Object {

		/*protected $idOption;
		protected $idModel;
		protected $nameOptions;
		protected $price;
		protected $description;*/
	}

	class Discount extends Object {

		/*protected $idDiscount;
		protected $persent;
		protected $idModel;
		protected $description;*/

	}

	class Auto extends Object {

		/*protected $idAuto;
		protected $idModel;
		protected $stateNumber;
		protected $status;
		protected $description;*/

		private function Status() {
			//вычисляем занята или свободна машинка в зависимости от даты 
			//возврата авто из договора, а также даты окончания страховки и даты окончания ТО
		}
	}

	class ImageAuto extends Object {

		/*protected $idImageAuto;
		protected $idAuto;
		protected $imgAuto;*/
	}

	class InsuranceAuto extends Object {

		/*protected $idInsuranceAuto;
		protected $numberInsPolicy;
		protected $dateInsEnd;
		protected $dateToEnd;
		protected $idAuto;*/
	}

	class RentalContract extends Object {

		/*protected $idClient;
		protected $idAuto;
		protected $conclusionDate;
		protected $receiptAutoDate;
		protected $receiptAutoTime;
		protected $placeReceipt;
		protected $returnDate;
		protected $returnTime;
		protected $placeReturn;
		protected $summ = 0;*/


		private function SummAdd() {
			//вычисление итоговой суммы исходя из стоимости авто, залога, 
			//а также выбранных дополнительных опций, скидки
			
		}
	}

	class Client extends Object {

		/*protected $idClient;
		protected $name;
		protected $surname;
		protected $patronymic;
		protected $numberDriverLicense;
		protected $dateDriverLicense;
		protected $phoneNumber;
		protected $passportID;
		protected $passportSeries;
		protected $passportIssuedBy;
		protected $dob;
		protected $regAddress;*/
	}

	class SelectOption extends Object {

		/*protected $idSelectOption;
		protected $idRcontract;
		protected $idOption;*/

	}

	class ActPP extends Object {

		//protected $idRcontract;
		//protected $dateAct=0;
		//protected $idFineTime;
		//protected $sumFinesGibdd;
		//protected $sumFines=0;

		private $sum;

		public function sumFinesAdd() {
			//сумма складывается из штрафов за гибдд и из штрафа за нарушение срока
			//который свою очередь вычисляется след образом: высчитывается продолжительность задержки авто
			//(дата возврата авто по договору - дата акта возврата авто) из таблицы штрафа за нарушение сроков выбирается штра
			
		}
	}

	class FineTime extends Object {

		/*
		protected $summ;*/

	}

	
	class Pages extends Object {

		//protected $pageTitle;
		//protected $text;
	}

	
	class Reviews extends Object {
		
		/*protected $userName;
		protected $titleReviews;
		protected $text;
		protected $date;
		protected $time;
		protected $email;*/

    	
	}