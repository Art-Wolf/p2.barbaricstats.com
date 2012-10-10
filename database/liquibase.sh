#!/bin/bash

java -jar liquibase.jar \
	--classpath=mysql-connector-java-5.1.22-bin.jar \
	--driver="com.mysql.jdbc.Driver" \
	--changeLogFile=scheme_changes.xml \
	--url="jdbc:mysql://localhost/barbaricstats" \
	--username=root \
	--password=root \
	generateChangeLog

