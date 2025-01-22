TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `Delete Application By Vol` BEFORE DELETE ON `volunteer_credential` FOR EACH ROW DELETE FROM `job_applications` WHERE `vol_id`= old.vol_id'
sql_modes=1098907648
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci'
created=1712277838625516
