SELECT * FROM information_schema.PROCESSLIST where COMMAND = 'query';

SELECT * FROM information_schema.LOCK;

SHOW STATUS LIKE 'Uptime';

SHOW STATUS LIKE 'Slow_queries';

SHOW FULL PROCESSLIST;
SELECT * FROM information_schema.innodb_trx;
SELECT trx_isolation_level as 'isolation_level' FROM information_schema.innodb_trx;

SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;
SET TRANSACTION ISOLATION LEVEL REPEATABLE READ;


SELECT * FROM information_schema.innodb_trx;
SELECT * FROM information_schema.processlist
WHERE id = 49;

start transaction;
update source set src_name="tsteLock1dassd" where src_cod=11;
commit;
