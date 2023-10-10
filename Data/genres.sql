--
-- File generated with SQLiteStudio v3.4.4 on Sat Oct 7 13:53:48 2023
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: genres
CREATE TABLE IF NOT EXISTS genres (
    genre_id   INTEGER PRIMARY KEY,
    genre_name TEXT
);

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       101,
                       'afroswing'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       102,
                       'alt z'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       103,
                       'art pop'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       104,
                       'atl hip hop'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       105,
                       'boy band'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       106,
                       'brostep'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       107,
                       'cali rap'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       108,
                       'canadian hip hop'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       109,
                       'chicago rap'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       110,
                       'dance pop'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       111,
                       'dfw rap'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       112,
                       'emo rap'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       113,
                       'folk-pop'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       114,
                       'grime'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       115,
                       'hip hop'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       116,
                       'indie pop'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       117,
                       'latin'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       118,
                       'melodic rap'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       119,
                       'pop'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       120,
                       'contemporary country'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       121,
                       'r&b'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       123,
                       'k-pop'
                   );

INSERT INTO genres (
                       genre_id,
                       genre_name
                   )
                   VALUES (
                       124,
                       'modern rock'
                   );


COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
