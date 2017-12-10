<?php
	class PETUGAS{

		private $db;

		function __construct($Connection){
			$this->db = $Connection;
		}		

		public function create_petugas($id_petugas,$nama,$no_hp){
			try{
				$stmt = $this->db->prepare("INSERT INTO petugas(ID_PETUGAS,NAMA,NO_HP) VALUES (:id_petugas,:nama,:no_hp)");
				$stmt->bindparam(':id_petugas',$id_petugas);				
				$stmt->bindparam(':nama',$nama);				
				$stmt->bindparam(':no_hp',$no_hp);				
				$stmt->execute();
				return true;
			}
			catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function create_user($id_petugas,$username,$password){
			try{
				$stmt = $this->db->prepare("INSERT INTO user(ID_PETUGAS,USERNAME,PASSWORD) VALUES (:id_petugas,:username,:password)");
				$stmt->bindparam(':id_petugas',$id_petugas);				
				$stmt->bindparam(':username',$username);				
				$stmt->bindparam(':password',$password);				
				$stmt->execute();
				return true;
			}
			catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function getID($id_petugas){
			$q = $this->db->prepare("SELECT * FROM petugas WHERE ID_PETUGAS=:id_petugas");
			$q->execute(array(':id_petugas'=>$id_petugas));
			$r = $q->fetch(PDO::FETCH_ASSOC);
			return true;
		}

		public function dataview($query){
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			if($stmt->rowCount()>0){
				$no=0;
				while($r=$stmt->fetch(PDO::FETCH_ASSOC)){
					$no++;
				?>				
				<tr>					
					<td class="v-align-middle semi-bold"><?php echo $no;?></td>
					<td class="v-align-middle"><?php echo $r['ID_PETUGAS'];?></td>
					<td class="v-align-middle"><?php echo $r['NAMA'];?></td>
					<td class="v-align-middle"><?php echo $r['NO_HP'];?></td>
					<td class="v-align-middle"><a href="index.php?page=petugas&aksi=edit&id=<?php echo $r['ID_PETUGAS'];?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
					<a href="index.php?page=petugas&aksi=hapus&id=<?php echo $r['ID_PETUGAS'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
				</tr>
				<?php	
				}
			}
		}

		public function delete($id_petugas){			
			$stmt = $this->db->prepare("DELETE FROM petugas WHERE ID_PETUGAS=:id_petugas");
			$stmt->bindparam(':id_petugas',$id_petugas);
			$stmt->execute();
			return true; 
		}

		public function update_petugas($id_petugas,$nama,$no_hp){
			try{
				$stmt = $this->db->prepare("UPDATE petugas SET 	NAMA=:nama,
																NO_HP=:no_hp
																WHERE ID_PETUGAS=:id_petugas");
				$stmt->bindparam(':id_petugas',$id_petugas);
				$stmt->bindparam(':nama',$nama);
				$stmt->bindparam(':no_hp',$no_hp);				
				$stmt->execute();
				return true;
			}
			catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function update_user($id_petugas,$username,$password){
			try{
				$stmt = $this->db->prepare("UPDATE user SET 	USERNAME=:username,
																PASSWORD=:password
																WHERE ID_PETUGAS=:id_petugas");
				$stmt->bindparam(':id_petugas',$id_petugas);				
				$stmt->bindparam(':username',$username);				
				$stmt->bindparam(':password',$password);
				$stmt->execute();
				return true;
			}
			catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

	}
?>