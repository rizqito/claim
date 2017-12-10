<?php
	class BARANG{

		private $db;

		function __construct($Connection){
			$this->db = $Connection;
		}		

		public function create($no_container,$nama_container,$asal_container,$tujuan_container){
			try{
				$stmt = $this->db->prepare("INSERT INTO container(NO_CONTAINER,NAMA_CONTAINER,ASAL_CONTAINER,TUJUAN_CONTAINER,FOTO_TAMPAK_LUAR,FOTO_TAMPAK_DALAM,WAKTU_MASUK,STATUS) VALUES (:no_container,:nama_container,:asal_container,:tujuan_container,'','','','OTW')");
				$stmt->bindparam(':no_container',$no_container);
				$stmt->bindparam(':nama_container',$nama_container);
				$stmt->bindparam(':asal_container',$asal_container);
				$stmt->bindparam(':tujuan_container',$tujuan_container);				
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
					<td class="v-align-middle"><?php echo $r['NO_CONTAINER'];?></td>
					<td class="v-align-middle"><?php echo $r['NAMA_CONTAINER'];?></td>
					<td class="v-align-middle"><?php echo $r['ASAL_CONTAINER']." / ".$r['TUJUAN_CONTAINER'];?></td>
					<td class="v-align-middle"><?php echo $r['STATUS'];?></td>
					<td class="v-align-middle">
					<a href="index.php?page=container&aksi=detail&id=<?php echo $r['NO_CONTAINER'];?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
					<a href="index.php?page=container&aksi=edit&id=<?php echo $r['NO_CONTAINER'];?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
					<a href="index.php?page=container&aksi=hapus&id=<?php echo $r['NO_CONTAINER'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
				<?php	
				}
			}
		}

		public function delete($no_container){			
			$stmt = $this->db->prepare("DELETE FROM container WHERE NO_CONTAINER=:no_container");
			$stmt->bindparam(':no_container',$no_container);
			$stmt->execute();
			return true; 
		}

		public function update($no_container,$nama_container,$asal_container,$tujuan_container,$foto_tampak_luar,$foto_tampak_dalam,$waktu_masuk,$status){
			try{
				$stmt = $this->db->prepare("UPDATE container SET 
																NAMA_CONTAINER=:nama_container,
																ASAL_CONTAINER=:asal_container,
																TUJUAN_CONTAINER=:tujuan_container,
																FOTO_TAMPAK_LUAR=:foto_tampak_luar,
																FOTO_TAMPAK_DALAM=:foto_tampak_dalam,
																WAKTU_MASUK=:waktu_masuk,STATUS=:status
																WHERE NO_CONTAINER=:no_container");
				$stmt->bindparam(':no_container',$no_container);
				$stmt->bindparam(':nama_container',$nama_container);
				$stmt->bindparam(':asal_container',$asal_container);
				$stmt->bindparam(':tujuan_container',$tujuan_container);
				$stmt->bindparam(':foto_tampak_luar',$foto_tampak_luar);
				$stmt->bindparam(':foto_tampak_dalam',$foto_tampak_dalam);
				$stmt->bindparam(':waktu_masuk',$waktu_masuk);			
				$stmt->bindparam(':status',$status);			
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