create schema if not exists lbaw2183;

-----------------------------------------
-- TYPES
-----------------------------------------
DROP TYPE IF EXISTS state CASCADE;
CREATE TYPE state AS ENUM ('pending', 'accepted', 'rejected');

-----------------------------------------
-- TABLES
-----------------------------------------
DROP TABLE IF EXISTS users CASCADE;
CREATE TABLE users(
    id SERIAL NOT NULL,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    password TEXT NOT NULL,
    birthday DATE,
    image TEXT DEFAULT 'img/user_pic.png',
    isAdmin BOOLEAN NOT NULL DEFAULT FALSE,
    remember_token VARCHAR,
    CONSTRAINT user_pkey PRIMARY KEY (id),
    CONSTRAINT email_unique UNIQUE (email)
);

DROP TABLE IF EXISTS "group" CASCADE;
CREATE TABLE "group"(
    id SERIAL NOT NULL,
    name TEXT NOT NULL,
    image text DEFAULT 'img/group.png',
    creator_id integer NOT NULL,
    CONSTRAINT group_pkey PRIMARY KEY (id),
    CONSTRAINT creator_fkey FOREIGN KEY (creator_id)
        REFERENCES users (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS group_member CASCADE;
CREATE TABLE group_member
(   
    id serial NOT NULL ,
    group_id integer NOT NULL,
    user_id integer NOT NULL,
    membership_state state NOT NULL DEFAULT 'pending',
    CONSTRAINT group_member_pkey PRIMARY KEY (id),
    CONSTRAINT group_member_group_fkey FOREIGN KEY (group_id)
        REFERENCES "group" (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT group_member_user_fkey FOREIGN KEY (user_id)
        REFERENCES users (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS publication CASCADE;
CREATE TABLE publication(
    id serial NOT NULL,
    description TEXT NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    image text,
    user_id integer NOT NULL,
    group_id integer,
    CONSTRAINT publication_pkey PRIMARY KEY (id),
    CONSTRAINT publication_user_id_fkey FOREIGN KEY (user_id)
        REFERENCES users (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT publication_group_id_fkey FOREIGN KEY (group_id)
        REFERENCES "group" (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);
DROP TABLE IF EXISTS comment CASCADE;
CREATE TABLE  comment
(
    id serial NOT NULL,
    user_id integer NOT NULL,
    publication_id integer NOT NULL,
    content TEXT NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT comment_pkey PRIMARY KEY (id),
    CONSTRAINT comment_publication_fkey FOREIGN KEY (publication_id)
        REFERENCES publication (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT comment_user_fkey FOREIGN KEY (user_id)
        REFERENCES users (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS "like" CASCADE;
CREATE TABLE "like"
(
    user_id integer NOT NULL,
    publication_id integer NOT NULL,
    CONSTRAINT like_pkey PRIMARY KEY (user_id, publication_id),
    CONSTRAINT like_publication_fkey FOREIGN KEY (publication_id)
        REFERENCES publication (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT like_user_fkey FOREIGN KEY (user_id)
        REFERENCES users (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS message CASCADE;
CREATE TABLE message(
    id serial NOT NULL ,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    content TEXT NOT NULL,
    sender_id integer NOT NULL,
    receiver_id integer NOT NULL,
    CONSTRAINT message_pkey PRIMARY KEY (id),
    CONSTRAINT message_sender_fkey FOREIGN KEY (sender_id)
        REFERENCES users (id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT message_receiver_fkey FOREIGN KEY (receiver_id)
        REFERENCES users (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS friendship CASCADE;
CREATE TABLE friendship(
    id serial NOT NULL ,
    sender_id integer NOT NULL,
    receiver_id integer NOT NULL,
    friendship_state state NOT NULL DEFAULT 'pending',
    CONSTRAINT friendship_pkey PRIMARY KEY (id),
    CONSTRAINT message_sender_fkey FOREIGN KEY (sender_id)
        REFERENCES users (id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT message_receiver_fkey FOREIGN KEY (receiver_id)
        REFERENCES users (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT diferent_user_check CHECK (sender_id <> receiver_id)
);

DROP TABLE IF EXISTS notification CASCADE;
CREATE TABLE notification
(
    id serial NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    receiver_id integer NOT NULL,
    group_id integer,
    friend_id integer,
    publication_id integer,
    CONSTRAINT notification_pkey PRIMARY KEY (id),
    CONSTRAINT notification_receiver_id_fkey FOREIGN KEY (receiver_id)
        REFERENCES users (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notification_group_id_fkey FOREIGN KEY (group_id)
        REFERENCES "group" (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notification_friend_id_fkey FOREIGN KEY (friend_id)
        REFERENCES users (id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notification_publication_id_fkey FOREIGN KEY (publication_id)
        REFERENCES publication (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notification_check CHECK (group_id IS NOT NULL AND friend_id IS NULL AND publication_id IS NULL OR group_id IS NULL AND friend_id IS NOT NULL AND publication_id IS NULL OR group_id IS NULL AND friend_id IS NULL AND publication_id IS NOT NULL) NOT VALID
);

-----------------------------------------
-- TRIGGERS
-----------------------------------------

DROP FUNCTION IF EXISTS  add_auto_notification_friend  CASCADE;
CREATE FUNCTION add_auto_notification_friend() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF (state(NEW.friendship_state) = state('pending')) THEN
        INSERT INTO "notification" (receiver_id,friend_id) VALUES (NEW.receiver_id,NEW.sender_id);
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
 
CREATE TRIGGER auto_notification_friend
    AFTER INSERT OR UPDATE ON friendship
    FOR EACH ROW
    EXECUTE PROCEDURE add_auto_notification_friend(); 



DROP FUNCTION IF EXISTS  add_auto_notification_group CASCADE;
CREATE FUNCTION add_auto_notification_group() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF (state(NEW.membership_state) = state('pending')) THEN
        INSERT INTO "notification" (receiver_id,group_id) VALUES (NEW.user_id,NEW.group_id);
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER auto_notification_group
    AFTER INSERT OR UPDATE ON group_member
    FOR EACH ROW
    EXECUTE PROCEDURE add_auto_notification_group();

