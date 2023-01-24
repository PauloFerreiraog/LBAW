create schema if not exists lbaw2183;

-----------------------------------------
-- POPULATE
-----------------------------------------

--GROUPS

INSERT INTO "users" (name,email,password,birthday,image,isAdmin) VALUES (
  'John Doe','admin@example.com','$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W', '2001-10-05','img/john.jpg','true'
); -- Password is 1234. Generated using Hash::make('1234')

INSERT INTO "users" (name,email,password,birthday,image,isAdmin) VALUES (
  'Mario Rui','mario@example.com','$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W','2001-10-05','img/mario.jpg','false'
); -- Password is 1234. Generated using Hash::make('1234')

INSERT INTO "users" (name,email,password,birthday,image,isAdmin) VALUES (
  'Raquel Soares','raquel@example.com','$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W','2001-10-05','img/raquel.jpeg','false'
); -- Password is 1234. Generated using Hash::make('1234')

INSERT INTO "users" (name,email,password,birthday,image,isAdmin) VALUES (
  'Andre Fernandes','andre@example.com','$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W','2001-10-05','img/andre.jpg','false'
); -- Password is 1234. Generated using Hash::make('1234')


--GROUPS
INSERT INTO "group" (name,image,creator_id) VALUES ('Adultos','img/old.jpg',1);
INSERT INTO "group" (name,image,creator_id) VALUES ('Jovens','img/young.png',2);


--GROUPS MEMBERS
INSERT INTO "group_member" (group_id,user_id,membership_state) VALUES (1,3,'accepted');
INSERT INTO "group_member" (group_id,user_id,membership_state) VALUES (1,4,'accepted');
INSERT INTO "group_member" (group_id,user_id,membership_state) VALUES (1,1,'accepted');
INSERT INTO "group_member" (group_id,user_id,membership_state) VALUES (1,2,'accepted');
INSERT INTO "group_member" (group_id,user_id,membership_state) VALUES (2,2,'accepted');



--publicationS
INSERT INTO "publication" (description,date,image,user_id) VALUES ('Hoje publiquei algo', '2022-01-03 10:00:10','img/old.jpg',2);
INSERT INTO "publication" (description,date,image,user_id) VALUES ('Eu tambem', '2022-01-03 10:01:10','',3);
INSERT INTO "publication" (description,date,image,user_id) VALUES ('Que coicidencia', '2022-01-03 10:02:10','',4);
INSERT INTO "publication" (description,date,image,user_id) VALUES ('Ahahahaha', '2022-01-03 10:03:10','',1);

INSERT INTO "publication" (description,date,image,user_id,group_id) VALUES ('Hoje publiquei algo', '2022-01-03 10:00:10','img/old.jpg',2,1);
INSERT INTO "publication" (description,date,image,user_id,group_id) VALUES ('Eu tambem', '2022-01-03 10:01:10','',3,1);
INSERT INTO "publication" (description,date,image,user_id,group_id) VALUES ('Que coicidencia', '2022-01-03 10:02:10','',4,1);
INSERT INTO "publication" (description,date,image,user_id,group_id) VALUES ('Ahahahaha', '2022-01-03 10:03:10','',1,1);


--COMMENT
INSERT INTO "comment" (user_id,publication_id,content,date) VALUES (1, 1, 'ola', '2022-01-03 20:00:10.245091');
INSERT INTO "comment" (user_id,publication_id,content,date) VALUES (2, 1, 'tudo', '2022-01-03 21:00:10.245091');
INSERT INTO "comment" (user_id,publication_id,content,date) VALUES (3, 2, 'bem', '2022-01-03 22:00:10.245091');
INSERT INTO "comment" (user_id,publication_id,content,date) VALUES (3, 2, 'amigo', '2022-01-03 23:00:10.245091');


--LIKE
INSERT INTO "like" (user_id,publication_id) VALUES (1, 1);
INSERT INTO "like" (user_id,publication_id) VALUES (2, 1);
INSERT INTO "like" (user_id,publication_id) VALUES (3, 1);
INSERT INTO "like" (user_id,publication_id) VALUES (1, 2);


--MESSAGE
INSERT INTO "message" (sender_id, receiver_id, content, date) VALUES (1, 2, 'oi', '2022-01-03 21:00:10.245091');
INSERT INTO "message" (sender_id, receiver_id, content, date) VALUES (2, 1, 'ola', '2022-01-03 22:00:10.245091');
INSERT INTO "message" (sender_id, receiver_id, content, date) VALUES (1, 2, 'tudo?', '2022-01-03 23:00:10.245091');


--FRIENDSHIP
INSERT INTO "friendship" (sender_id,receiver_id,friendship_state) VALUES (1, 2, 'accepted');
INSERT INTO "friendship" (sender_id,receiver_id,friendship_state) VALUES (1, 3, 'accepted');
--INSERT INTO "friendship" (sender_id,receiver_id,friendship_state) VALUES (1, 4, 'accepted');


--NOTIFICATION
INSERT INTO "notification" (receiver_id, publication_id, date) VALUES (1, 1, '2022-01-03 21:00:10.245091');
INSERT INTO "notification" (receiver_id, friend_id, date) VALUES (1, 1, '2022-01-03 22:00:10.245091');
INSERT INTO "notification" (receiver_id, group_id, date) VALUES (1, 1, '2022-01-03 23:00:10.245091');
