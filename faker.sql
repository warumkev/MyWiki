--
-- PostgreSQL database faker
--
-- Insert sample users
INSERT INTO users (
        username,
        password_hash,
        email,
        isAdmin,
        userimage_url
    )
VALUES (
        'defaultuser',
        crypt('userpassword', gen_salt('bf')),
        'user1@example.com',
        FALSE,
        'users\defaultuser.jpg'
    ),
    (
        'adminuser',
        crypt('adminpassword', gen_salt('bf')),
        'user2@example.com',
        TRUE,
        'users\adminuser.jpg'
    );
-- Insert sample posts
INSERT INTO posts (title, body, cover_image_url, author_id)
VALUES (
        'Article 1',
        '# Lorem Ipsum
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim enim a diam lobortis, et finibus tellus aliquet.',
        'default-posts.jpg',
        1
    ),
    (
        'Article 2',
        '# Beispielartikel 
Dies ist ein Beispielartikel.',
        '/posts/article-2.jpg',
        2
    );
-- Interst sample messages
INSERT INTO messages (author_id, content)
VALUES (
        1,
        'SGVsbG8sIHRoaXMgaXMgYSBtZXNzYWdl'
    );
