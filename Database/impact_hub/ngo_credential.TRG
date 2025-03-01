TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `Delete Application By Ngo` BEFORE DELETE ON `ngo_credential` FOR EACH ROW DELETE FROM `job_applications` WHERE `ngo_id`=old.ngo_id' 'CREATE DEFINER=`root`@`localhost` TRIGGER `Delete Job By Ngo` BEFORE DELETE ON `ngo_credential` FOR EACH ROW DELETE FROM `job_information` WHERE `ngo_id`= old.ngo_id'
sql_modes=524288 524288
definers='root@localhost' 'root@localhost'
client_cs_names='utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_general_ci' 'utf8mb4_general_ci'
db_cl_names='utf8mb4_general_ci' 'utf8mb4_general_ci'
created=1728494264767869 1728494264813475
