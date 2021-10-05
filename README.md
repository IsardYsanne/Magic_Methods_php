#Serialization and unserialization
<br>
The method __sleep() is called when you serialize() an object and __wakeup() after you unserialize() it.
<br>
Serialization is used to persist objects: You will get a representation of an object as a string that can then be stored in $_SESSION, a database, cookies or anywhere else you desire.
<br>
