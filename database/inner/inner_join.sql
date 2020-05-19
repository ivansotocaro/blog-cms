SELECT matricula.id as id_matricula, matricula.fecha as fecha_matricula, matricula.valor as valor_matricula, estudiante.numero_documento as documento_estudiante, estudiante.nombre as nombre_estudiante, estudiante.apellido as apellido_estudiante, acudiente.numero_documento as documento_acudiente, acudiente.nombre as nombre_acudiente, acudiente.apellido as apellido_acudiente,
curso.nombre as nombre_curso 
FROM matricula
INNER JOIN estudiante ON matricula.fk_id_estudiante = estudiante.id
INNER JOIN acudiente ON matricula.fk_id_acudiente = acudiente.id
INNER JOIN curso ON matricula.fk_id_curso = curso.id where matricula.id = 2;




SELECT posts.id as id_posts, posts.name as name_posts, posts.excerpt as excerpt_posts,
posts.slug as slug_posts, posts.body as body_posts, posts.status as status_posts, posts.user_id as user_id_posts, posts.category_id as category_id_posts
FROM posts
INNER JOIN categories ON posts.category_id = categories.id
INNER JOIN users ON posts.user_id = users.id where posts.id = 101;
