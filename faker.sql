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
        'img\users\defaultuser.jpg'
    ),
    (
        'adminuser',
        crypt('adminpassword', gen_salt('bf')),
        'user2@example.com',
        TRUE,
        'img\users\adminuser.jpg'
    );

-- Insert sample articles
INSERT INTO articles (title, body, cover_image_url, author_id)
VALUES (
        'Article 1',
        '# Lorem Ipsum
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim enim a diam lobortis, et finibus tellus aliquet. Vestibulum sed diam non nunc viverra egestas. Aenean at purus vel lectus accumsan laoreet vel in nisi. Proin quis erat non mauris placerat faucibus. Nunc congue dui quis purus ultricies tincidunt. Vivamus ut semper diam. Aliquam erat volutpat. Proin velit lacus, tincidunt vel ultricies in, vehicula eget tortor. Donec laoreet enim et nibh gravida, a condimentum erat faucibus. Aliquam porttitor nunc sit amet nulla ornare consectetur.
    ## Lorem Ipsum Dolor
    Suspendisse quis purus a nisl dictum dictum id non purus. Donec vehicula tincidunt leo. Proin eget elit sit amet ipsum porta tincidunt. In hac habitasse platea dictumst. Mauris iaculis nisi nisi, at ultricies urna dictum.',
        'img/default-articles.jpg',
        1
    ),
    (
        'Article 2',
        '## Lorem Ipsum Dolor
    Suspendisse quis purus a nisl dictum dictum id non purus. Donec vehicula tincidunt leo. Proin eget elit sit amet ipsum porta tincidunt. In hac habitasse platea dictumst. Mauris iaculis nisi nisi, at ultricies urna dictum in. Vivamus eleifend odio in nisi aliquam ultricies. Nullam at lectus quis enim dignissim fringilla.
    ### Lorem Ipsum Sit Amet
    Vestibulum et quam ligula. Aliquam id tincidunt metus. Aenean auctor, elit a posuere fringilla, urna nulla tincidunt leo, et laore.',
        'img/default-articles.jpg',
        2
    );

-- Interst sample messages
INSERT INTO messages (author_id, content)
VALUES (
        1,
        'SGVsbG8sIHRoaXMgaXMgYSBtZXNzYWdl'
    );
