INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `mobile`, `username`, `password`, `role`) VALUES
(1, NULL, NULL, NULL, NULL, 'akhil_reddy', '$2y$10$ga9lLtxKgc7eoilqZh0t0.Qm460BceWQ1o1Qmp.zgvkSr3IdjoQAi', 'user'),
(2, NULL, NULL, NULL, NULL, 'sneha_sharma', '$2y$10$9inggeHESmWZLJj1lje36evTdLRgqioazSU61vUGmC57RTETEp8My', 'user'),
(3, NULL, NULL, NULL, NULL, 'vikram_kumar', '$2y$10$r9ov1/geSIcXiRnFCQ.O5unm16FMB.KD0JuX8mGEczPWEsfGvStHO', 'user'),
(4, NULL, NULL, NULL, NULL, 'priya_reddy', '$2y$10$udxKMeKZi8g6jPUbxUKlRe8fZ5X20QMIGEeXHf91ydUCfgtgKRm5m', 'user'),
(5, NULL, NULL, NULL, NULL, 'rahul_naik', '$2y$10$e2tvJ0a/d8uGxWJISQUC9upXFf6DKRO1BkcQLaIKeD7rxurkl7PFW', 'user'),
(6, NULL, NULL, NULL, NULL, 'kavya_singh', '$2y$10$ghf9hanEvno7pTT2.B8lguCtuxfaDStO8b5YYvqifveKDaycxmJwO', 'user'),
(7, NULL, NULL, NULL, NULL, 'manoj_yadav', '$2y$10$II97wFP/NktDPnx4VccgjOcGckGKoSugW.ehEbCvk7GnVxp29uUYC', 'user'),
(8, NULL, NULL, NULL, NULL, 'divya_reddy', '$2y$10$lJ9yrQ40stsHXKMEElx1/eSFweHQw2vM.mM0k8Dhetpr1OcaRJaGm', 'user'),
(9, NULL, NULL, NULL, NULL, 'suresh_babu', '$2y$10$vuPAzIZODhIGyUy.n9XddOm2Q5.1qnT4FE/k4hxYvqQNKUllJQdA.', 'user'),
(10, NULL, NULL, NULL, NULL, 'ananya_rao', '$2y$10$yAiszUVAu2RerrsWRjWPVOMm8dQcfIGEM1P78kw8y.Cgotp7idXdW', 'user'),
(11, NULL, NULL, NULL, NULL, 'ramesh_kumar', '$2y$10$HJ52DOTz8u3P9vEQuK6Ri.t9.PdmihmTU.h.HYuln95yo8LLvGYHO', 'user'),
(12, NULL, NULL, NULL, NULL, 'lakshmi_devi', '$2y$10$t5U4vCi2KeatH05Vm4yGhuQ/O2oY921XPS9tuukF1GqqXR4JBHBVK', 'user'),
(13, NULL, NULL, NULL, NULL, 'sai_teja', '$2y$10$Tm87PPIfs2WjKkUzNWGGVu6cpL4LvRNU3cPBgpDL3yntFsXcIFXX2', 'user'),
(14, NULL, NULL, NULL, NULL, 'harsha_vardhan', '$2y$10$1HdwwePdyzDDegweCQgJ.uYqFnF59mfPulv8Bmyco1aH.9UV6k//O', 'user'),
(15, NULL, NULL, NULL, NULL, 'naveen_reddy', '$2y$10$D5pY.JIZgoFUrkDYooA6IexwQzFdqofexiPrMA.5uJl9yJcTAVHbi', 'user'),

(17, 'Dheeraj', 'k', 'abcd@gmail.com', '8639532999', 'dheeraj', '$2y$10$oQvHbwdCO.ves.zu5Xfe6uFOyRHP56iHbueNYNWBslvvgm61N/HPG', 'user');

-- Admin account for system control , admin password is 'admin123' hashed using bcrypt
(16, NULL, NULL, NULL, NULL, 'admin', '$2y$10$phve48UKHeujfFWuj5aGsuOuoX.YRi./JbvMUocExz8AFdBuhWc1G', 'admin'),

INSERT INTO route (route_name, source_point, destination_point) VALUES
('Miyapur to Hitech City', 'Miyapur', 'Hitech City'),
('LB Nagar to Ameerpet', 'LB Nagar', 'Ameerpet'),
('Secunderabad to Gachibowli', 'Secunderabad', 'Gachibowli'),
('Koti to Madhapur', 'Koti', 'Madhapur'),
('Uppal to JNTU', 'Uppal', 'JNTU Kukatpally'),
('Dilsukhnagar to Raidurg', 'Dilsukhnagar', 'Raidurg'),
('Mehdipatnam to Hitech City', 'Mehdipatnam', 'Hitech City'),
('BHEL to Lakdikapul', 'BHEL', 'Lakdikapul'),
('KPHB to Financial District', 'KPHB', 'Financial District'),
('Charminar to Gachibowli', 'Charminar', 'Gachibowli'),
('Begumpet to Madhapur', 'Begumpet', 'Madhapur'),
('Secunderabad to Miyapur', 'Secunderabad', 'Miyapur'),
('Hitech City to LB Nagar', 'Hitech City', 'LB Nagar'),
('Ameerpet to Uppal', 'Ameerpet', 'Uppal'),
('Gachibowli to Koti', 'Gachibowli', 'Koti');

INSERT INTO schedule (route_id, stop_name, first_bus, second_bus, third_bus) VALUES
(1, 'Patancheru', '06:30:00', '09:00:00', '17:30:00'),
(2, 'LB Nagar Metro Station', '06:45:00', '09:15:00', '18:00:00'),
(3, 'Secunderabad Railway Station', '07:00:00', '10:00:00', '18:30:00'),
(4, 'Koti Bus Stand', '07:10:00', '09:40:00', '17:45:00'),
(5, 'Uppal X Road', '06:50:00', '09:20:00', '18:10:00'),
(6, 'Dilsukhnagar Bus Stop', '07:15:00', '10:15:00', '19:00:00'),
(7, 'Mehdipatnam Junction', '06:20:00', '08:50:00', '17:20:00'),
(8, 'BHEL Township', '07:30:00', '10:30:00', '18:45:00'),
(9, 'KPHB Colony', '06:40:00', '09:10:00', '17:50:00'),
(10, 'Charminar Bus Stop', '07:00:00', '10:00:00', '18:00:00'),
(11, 'Secunderabad Station', '07:20:00', '10:20:00', '19:10:00'),
(12, 'Hitech City Bus Stop', '08:00:00', '11:00:00', '19:30:00'),
(13, 'Gachibowli Junction', '06:30:00', '09:30:00', '17:30:00');

INSERT INTO vehicle (vehicle_reg_no, driver_name, joining_date, mobile, age, license_no) VALUES
('TS09AB1234', 'Ramesh Yadav', '2022-03-15', '9876543210', 42, 'DLHYD20220001'),
('TS09CD5678', 'Srinivas Rao', '2021-07-10', '9123456780', 38, 'DLHYD20210045'),
('TS10EF2345', 'Kiran Kumar', '2023-01-20', '9988776655', 35, 'DLHYD20230012'),
('TS09GH6789', 'Venkat Sharma', '2020-11-05', '9012345678', 45, 'DLHYD20200098'),
('TS11JK3456', 'Praveen Reddy', '2022-09-12', '8899776655', 40, 'DLHYD20220110'),
('TS09LM7890', 'Mahesh Babu', '2021-05-25', '9871234560', 37, 'DLHYD20210067'),
('TS10NP4567', 'Suresh Naik', '2023-06-18', '9123987456', 33, 'DLHYD20230055'),
('TS09QR8901', 'Anil Kumar', '2020-02-28', '9001122334', 48, 'DLHYD20200021'),
('TS11ST2345', 'Ravi Teja', '2022-12-01', '9988123456', 36, 'DLHYD20220189'),
('TS10UV6789', 'Narasimha Rao', '2021-10-14', '8899001122', 41, 'DLHYD20210123');


INSERT INTO booking (name, book_date, pickup_point, destination, mobile, email, username, status) VALUES
('Akhil Reddy', '2026-04-20', 'Miyapur', 'Hitech City', '9876543210', 'akhil.reddy@gmail.com', 'akhil_reddy', 1),
('Sneha Sharma', '2026-04-20', 'LB Nagar', 'Ameerpet', '9123456780', 'sneha.sharma@yahoo.com', 'sneha_sharma', 1),
('Vikram Kumar', '2026-04-21', 'Secunderabad', 'Gachibowli', '9988776655', 'vikram.k@gmail.com', 'vikram_kumar', 1),
('Priya Reddy', '2026-04-21', 'Koti', 'Madhapur', '9012345678', 'priya.r@gmail.com', 'priya_reddy', 1),
('Rahul Naik', '2026-04-22', 'Uppal', 'JNTU Kukatpally', '8899776655', 'rahul.naik@gmail.com', 'rahul_naik', 1),
('Kavya Singh', '2026-04-22', 'Dilsukhnagar', 'Raidurg', '9871234560', 'kavya.singh@gmail.com', 'kavya_singh', 1),
('Manoj Yadav', '2026-04-23', 'Mehdipatnam', 'Hitech City', '9123987456', 'manoj.yadav@gmail.com', 'manoj_yadav', 1),
('Divya Reddy', '2026-04-23', 'BHEL', 'Lakdikapul', '9001122334', 'divya.r@gmail.com', 'divya_reddy', 1),
('Suresh Babu', '2026-04-24', 'KPHB', 'Financial District', '9988123456', 'suresh.babu@gmail.com', 'suresh_babu', 1),
('Ananya Rao', '2026-04-24', 'Charminar', 'Gachibowli', '8899001122', 'ananya.rao@gmail.com', 'ananya_rao', 1),
('Ramesh Kumar', '2026-04-25', 'Begumpet', 'Madhapur', '9876012345', 'ramesh.kumar@gmail.com', 'ramesh_kumar', 1),
('Lakshmi Devi', '2026-04-25', 'Secunderabad', 'Miyapur', '9123001122', 'lakshmi.devi@gmail.com', 'lakshmi_devi', 1),
('Sai Teja', '2026-04-26', 'Hitech City', 'LB Nagar', '9988002233', 'sai.teja@gmail.com', 'sai_teja', 1),
('Harsha Vardhan', '2026-04-26', 'Ameerpet', 'Uppal', '9009988776', 'harsha.v@gmail.com', 'harsha_vardhan', 1),
('Naveen Reddy', '2026-04-27', 'Gachibowli', 'Koti', '8899112233', 'naveen.reddy@gmail.com', 'naveen_reddy', 1);