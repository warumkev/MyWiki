--
-- PostgreSQL database dump
--

---------------- CREATE DATABASE ----------------

-- CREATE DATABASE "myWiki"
--     WITH
--     OWNER = postgres
--     ENCODING = 'UTF8'
--     CONNECTION LIMIT = -1
--     IS_TEMPLATE = False;

-- CREATE EXTENSION pgcrypto;

---------------- CREATE TABLES ----------------

-- drop tables if they exist
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS users;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
  id SERIAL PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  isAdmin BOOLEAN DEFAULT FALSE,
  userimage_url VARCHAR(255) DEFAULT 'img\default-users.jpg',
  created_at TIMESTAMP DEFAULT NOW()
);

-- Create the posts table
CREATE TABLE posts (
  id SERIAL PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  body TEXT NOT NULL,
  views INTEGER DEFAULT 0,
  cover_image_url VARCHAR(255) DEFAULT 'img\default-posts.jpg',
  author_id INTEGER REFERENCES users(id),
  created_at TIMESTAMP DEFAULT NOW()
);

-- Create the messages table
CREATE TABLE messages (
  id SERIAL PRIMARY KEY,
  author_id INTEGER REFERENCES users(id),
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT NOW()
);
