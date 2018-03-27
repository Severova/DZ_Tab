<?php 
	abstract class PrototypeEssence 
	{
		public function __construct ($params = []) 
		{
			foreach ($params as $key => $value){
                $this->$key = $value;
        	}
		}

		public function receiveAtr()
		{
			//взять данные из таблицы
		}

		public function writeСortege($params = [], $mysqli)//записать в таблицу
		{
			$query = "INSERT INTO ". static::class ." VALUES ('DEFAULT ";

			 foreach ($params as $key => $value){
                $query.= "', '$value";
        	}
        	$query.= "')";

        	$mysqli->query($query);
		}

		public function updateСortege()//обновить запись в таблице
		{
			
		}

		public function deleteСortege()
		{
			//удалить из бд
		}
	}

	class ModelAuto extends PrototypeEssence {

		protected $idModel;
		protected $idBrend;
		protected $idBodyAuto;
		protected $idTransmission;
		protected $nameModel;

	}

	class Deposit extends PrototypeEssence {

		protected $idDeposit;
		protected $idPrise;
		protected $priseDeposit;
	}

	class PriseModel extends PrototypeEssence {

		protected $idPrise;
		protected $idModel;
		protected $prise;
	}


	class BrendAuto extends PrototypeEssence {

		protected $idBrend;
		protected $nameBrend;
	}

	class Transmission extends PrototypeEssence {

		protected $idTransmission;
		protected $type;
	}

	class BodyAuto extends PrototypeEssence {

		protected $idBodyAuto;
		protected $typeBodyAuto;

	}

	class AdditionalOption extends PrototypeEssence {

		protected $idOption;
		protected $idModel;
		protected $nameOptions;
		protected $price;
		protected $description;
	}

	class Discount extends PrototypeEssence {

		protected $idDiscount;
		protected $persent;
		protected $idModel;
		protected $description;

	}

	class Auto extends PrototypeEssence {

		protected $idAuto;
		protected $idModel;
		protected $stateNumber;
		protected $status;
		protected $description;

		private function Status() {
			//вычисляем занята или свободна машинка в зависимости от даты 
			//возврата авто из договора, а также даты окончания страховки и даты окончания ТО
		}
	}

	class ImageAuto extends PrototypeEssence {

		protected $idImageAuto;
		protected $idAuto;
		protected $imgAuto;
	}

	class InsuranceAuto extends PrototypeEssence {

		protected $idInsuranceAuto;
		protected $numberInsPolicy;
		protected $dateInsEnd;
		protected $dateToEnd;
		protected $idAuto;
	}

	class RentalContract extends PrototypeEssence {

		protected $idRentalContract;
		protected $idClient;
		protected $idAuto;
		protected $conclusionDate;
		protected $receiptAutoDate;
		protected $receiptAutoTime;
		protected $placeReceipt;
		protected $returnDate;
		protected $returnTime;
		protected $placeReturn;
		protected $summ;


		private function Summ() {
			//вычисление итоговой суммы исходя из стоимости авто, залога, 
			//а также выбранных дополнительных опций, скидки
		}
	}

	class Client extends PrototypeEssence {

		protected $idClient;
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
		protected $regAddress;
	}

	class SelectOption extends PrototypeEssence {

		protected $idSelectOption;
		protected $idRcontract;
		protected $idOption;

	}

	class ActPP extends PrototypeEssence {

		protected $idAct;
		protected $idRcontract;
		protected $dateAct;
		protected $sumFinesGibdd;
		protected $sumFines;

		private function sumFines() {
			//сумма складывается из штрафов за гибдд и из штрафа за нарушение срока
			//который свою очередь вычисляется след образом: высчитывается продолжительность задержки авто
			//(дата возврата авто по договору - дата акта возврата авто) из таблицы штрафа за нарушение сроков выбирается штраф
		}
	}

	class FineTime extends PrototypeEssence {

		protected $idFineTime;
		protected $amountDays;
		protected $summ;

	}

	class pages extends PrototypeEssence {

		protected $idPages;
		protected $pageTitle;
		protected $text;

	}

	class Reviews extends PrototypeEssence {

		protected $idReviews;
		protected $userName;
		protected $titleReviews;
		protected $text;
		protected $date;
		protected $time;
		protected $email;

	}