<?php
$BEAUT_PATH = realpath(".") . "/Services/COPage/syntax_highlight/php";
if (!isset($BEAUT_PATH)) {
    return;
}
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_ib_sql extends HFile
  {
      public function HFile_ib_sql()
      {
          $this->HFile();
          /*************************************/
          // Beautifier Highlighting Configuration File
          // IB SQL
          /*************************************/
          // Flags

          $this->nocase            	= "1";
          $this->notrim            	= "0";
          $this->perl              	= "0";

          // Colours

          $this->colours        	= array("blue", "purple", "gray");
          $this->quotecolour       	= "blue";
          $this->blockcommentcolour	= "green";
          $this->linecommentcolour 	= "green";

          // Indent Strings

          $this->indent            	= array();
          $this->unindent          	= array();

          // String characters and delimiters

          $this->stringchars       	= array();
          $this->delimiters        	= array();
          $this->escchar           	= "";

          // Comment settings

          $this->linecommenton     	= array("--");
          $this->blockcommenton    	= array("/*");
          $this->blockcommentoff   	= array("*/");

          // Keywords (keyword mapping to colour number)

          $this->keywords          	= array(
            "ACTION" => "1",
            "ACTIVE" => "1",
            "ADD" => "1",
            "ADMIN" => "1",
            "AFTER" => "1",
            "ALL" => "1",
            "ALTER" => "1",
            "AND" => "1",
            "ANY" => "1",
            "AS" => "1",
            "ASC" => "1",
            "ASCENDING" => "1",
            "AT" => "1",
            "AUTO" => "1",
            "AUTODDL" => "1",
            "BASED" => "1",
            "BASENAME" => "1",
            "BASE_NAME" => "1",
            "BEFORE" => "1",
            "BEGIN" => "1",
            "BETWEEN" => "1",
            "BLOB" => "1",
            "BLOBEDIT" => "1",
            "BUFFER" => "1",
            "BY" => "1",
            "CACHE" => "1",
            "CASCADE" => "1",
            "CHARACTER" => "1",
            "CHARACTER_LENGTH" => "1",
            "CHAR_LENGTH" => "1",
            "CHECK" => "1",
            "CHECK_POINT_LEN" => "1",
            "CHECK_POINT_LENGTH" => "1",
            "COLLATE" => "1",
            "COLLATION" => "1",
            "COLUMN" => "1",
            "COMMIT" => "1",
            "COMMITTED" => "1",
            "COMPILETIME" => "1",
            "COMPUTED" => "1",
            "CLOSE" => "1",
            "CONDITIONAL" => "1",
            "CONNECT" => "1",
            "CONSTRAINT" => "1",
            "CONTAINING" => "1",
            "CONTINUE" => "1",
            "CREATE" => "1",
            "CURRENT" => "1",
            "CURSOR" => "1",
            "DATABASE" => "1",
            "DB_KEY" => "1",
            "DEBUG" => "1",
            "DEC" => "1",
            "DECLARE" => "1",
            "DEFAULT" => "1",
            "DELETE" => "1",
            "DESC" => "1",
            "DESCENDING" => "1",
            "DESCRIBE" => "1",
            "DESCRIPTOR" => "1",
            "DISCONNECT" => "1",
            "DISPLAY" => "1",
            "DISTINCT" => "1",
            "DO" => "1",
            "DOMAIN" => "1",
            "DROP" => "1",
            "ECHO" => "1",
            "EDIT" => "1",
            "ELSE" => "1",
            "END" => "1",
            "ENTRY_POINT" => "1",
            "ESCAPE" => "1",
            "EVENT" => "1",
            "EXCEPTION" => "1",
            "EXECUTE" => "1",
            "EXISTS" => "1",
            "EXIT" => "1",
            "EXTERN" => "1",
            "EXTERNAL" => "1",
            "EXTRACT" => "1",
            "FETCH" => "1",
            "FILE" => "1",
            "FILTER" => "1",
            "FOR" => "1",
            "FOREIGN" => "1",
            "FOUND" => "1",
            "FREE_IT" => "1",
            "FROM" => "1",
            "FULL" => "1",
            "FUNCTION" => "1",
            "GDSCODE" => "1",
            "GENERATOR" => "1",
            "GEN_ID" => "1",
            "GLOBAL" => "1",
            "GOTO" => "1",
            "GRANT" => "1",
            "GROUP" => "1",
            "GROUP_COMMIT_WAIT" => "1",
            "GROUP_COMMIT_WAIT_TIME" => "1",
            "HAVING" => "1",
            "HELP" => "1",
            "IF" => "1",
            "IMMEDIATE" => "1",
            "IN" => "1",
            "INACTIVE" => "1",
            "INDEX" => "1",
            "INDICATOR" => "1",
            "INIT" => "1",
            "INNER" => "1",
            "INPUT" => "1",
            "INPUT_TYPE" => "1",
            "INSERT" => "1",
            "INTO" => "1",
            "IS" => "1",
            "ISOLATION" => "1",
            "ISQL" => "1",
            "JOIN" => "1",
            "KEY" => "1",
            "LC_MESSAGES" => "1",
            "LC_TYPE" => "1",
            "LEFT" => "1",
            "LENGTH" => "1",
            "LEV" => "1",
            "LEVEL" => "1",
            "LIKE" => "1",
            "LOGFILE" => "1",
            "LOG_BUFFER_SIZE" => "1",
            "LOG_BUF_SIZE" => "1",
            "LONG" => "1",
            "MANUAL" => "1",
            "MAXIMUM_SEGMENT" => "1",
            "MAX_SEGMENT" => "1",
            "MERGE" => "1",
            "MESSAGE" => "1",
            "MODULE_NAME" => "1",
            "NAMES" => "1",
            "NATIONAL" => "1",
            "NATURAL" => "1",
            "NO" => "1",
            "NOAUTO" => "1",
            "NOT" => "1",
            "NUM_LOG_BUFS" => "1",
            "NUM_LOG_BUFFERS" => "1",
            "OCTET_LENGTH" => "1",
            "OF" => "1",
            "ON" => "1",
            "ONLY" => "1",
            "OPEN" => "1",
            "OPTION" => "1",
            "OR" => "1",
            "ORDER" => "1",
            "OUTER" => "1",
            "OUTPUT" => "1",
            "OUTPUT_TYPE" => "1",
            "OVERFLOW" => "1",
            "PAGE" => "1",
            "PAGELENGTH" => "1",
            "PAGES" => "1",
            "PAGE_SIZE" => "1",
            "PARAMETER" => "1",
            "PASSWORD" => "1",
            "PLAN" => "1",
            "POSITION" => "1",
            "POST_EVENT" => "1",
            "PRECISION" => "1",
            "PREPARE" => "1",
            "PROCEDURE" => "1",
            "PROTECTED" => "1",
            "PRIMARY" => "1",
            "PRIVILEGES" => "1",
            "PUBLIC" => "1",
            "QUIT" => "1",
            "RAW_PARTITIONS" => "1",
            "RDB$DB_KEY" => "1",
            "READ" => "1",
            "RECORD_VERSION" => "1",
            "REFERENCES" => "1",
            "RELEASE" => "1",
            "RESERV" => "1",
            "RESERVING" => "1",
            "RESTRICT" => "1",
            "RETAIN" => "1",
            "RETURN" => "1",
            "RETURNING_VALUES" => "1",
            "RETURNS" => "1",
            "REVOKE" => "1",
            "RIGHT" => "1",
            "ROLE" => "1",
            "ROLLBACK" => "1",
            "RUNTIME" => "1",
            "SCHEMA" => "1",
            "SEGMENT" => "1",
            "SELECT" => "1",
            "SET" => "1",
            "SHADOW" => "1",
            "SHARED" => "1",
            "SHELL" => "1",
            "SHOW" => "1",
            "SINGULAR" => "1",
            "SIZE" => "1",
            "SNABeautifierOT" => "1",
            "SOME" => "1",
            "SORT" => "1",
            "SQL" => "1",
            "SQLERROR" => "1",
            "SQLWARNING" => "1",
            "STABILITY" => "1",
            "STARTING" => "1",
            "STARTS" => "1",
            "STATEMENT" => "1",
            "STATIC" => "1",
            "STATISTICS" => "1",
            "SUB_TYPE" => "1",
            "SUSPEND" => "1",
            "TABLE" => "1",
            "TERMINATOR" => "1",
            "THEN" => "1",
            "TO" => "1",
            "TRANSACTION" => "1",
            "TRANSLATE" => "1",
            "TRANSLATION" => "1",
            "TRIGGER" => "1",
            "TRIM" => "1",
            "UNCOMMITTED" => "1",
            "UNION" => "1",
            "UNIQUE" => "1",
            "UPDATE" => "1",
            "UPPER" => "1",
            "USING" => "1",
            "VALUE" => "1",
            "VALUES" => "1",
            "VARIABLE" => "1",
            "VERSION" => "1",
            "VIEW" => "1",
            "WAIT" => "1",
            "WHEN" => "1",
            "WHENEVER" => "1",
            "WHERE" => "1",
            "WHILE" => "1",
            "WITH" => "1",
            "WORK" => "1",
            "WRITE" => "1",
            "AVG" => "2",
            "COUNT" => "2",
            "CAST" => "2",
            "MAX" => "2",
            "MAXIMUM" => "2",
            "MIN" => "2",
            "MINIMUM" => "2",
            "NULL" => "2",
            "NOW" => "2",
            "SQLCODE" => "2",
            "SUM" => "2",
            "USER" => "2",
            "bool" => "3",
            "CHAR" => "3",
            "DATE" => "3",
            "CSTRING" => "3",
            "DECIMAL" => "3",
            "DOUBLE" => "3",
            "FLOAT" => "3",
            "INT" => "3",
            "INTEGER" => "3",
            "hbool" => "3",
            "NCHAR" => "3",
            "NUMERIC" => "3",
            "REAL" => "3",
            "SMALLINT" => "3",
            "TIME" => "3",
            "VARCHAR" => "3",
            "VARYING" => "3");

          // Special extensions

          // Each category can specify a PHP function that returns an altered
          // version of the keyword.
        
        

          $this->linkscripts    	= array(
            "1" => "donothing",
            "2" => "donothing",
            "3" => "donothing");
      }


      public function donothing($keywordin)
      {
          return $keywordin;
      }
  }
