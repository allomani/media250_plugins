insert into mobile_phrases_cats (id,name) values('events','Events');



CREATE TABLE `events_data` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `day` int(11) NOT NULL default '0',
  `month` int(11) NOT NULL default '0',
  `year` int(11) NOT NULL default '0',
  `typeid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE `events_types` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `color` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `events_types`
-- 

INSERT INTO `events_types` (`id`, `name`, `color`) VALUES 
(1, 'indoor', '#EEEEE'),
(2, 'outdoor', '#EEDEE');





insert into mobile_phrases (name,value,cat) values('the_events','الأحداث','events');
insert into mobile_phrases (name,value,cat) values('the_events_types','أنواع الأحداث','events');
insert into mobile_phrases (name,value,cat) values('event_not_exists','عفوا , هذا الحدث غير موجود ','events');
insert into mobile_phrases (name,value,cat) values('no_events','لا توجد احداث','events');
insert into mobile_phrases (name,value,cat) values('january','يناير','events');
insert into mobile_phrases (name,value,cat) values('february','فبراير','events');
insert into mobile_phrases (name,value,cat) values('march','مارس','events');
insert into mobile_phrases (name,value,cat) values('april','ابريل','events');
insert into mobile_phrases (name,value,cat) values('may','مايو','events');
insert into mobile_phrases (name,value,cat) values('june','يونيو','events');
insert into mobile_phrases (name,value,cat) values('july','يوليو','events');
insert into mobile_phrases (name,value,cat) values('august','اغسطس','events');
insert into mobile_phrases (name,value,cat) values('september','سبتمبر','events');
insert into mobile_phrases (name,value,cat) values('october','اكتوبر','events');
insert into mobile_phrases (name,value,cat) values('november','نوفمبر','events');
insert into mobile_phrases (name,value,cat) values('december','ديسمبر','events');
insert into mobile_phrases (name,value,cat) values('events_prev','السابق','events');
insert into mobile_phrases (name,value,cat) values('events_next','التالي','events');
insert into mobile_phrases (name,value,cat) values('add_event','اضافة حدث','events');
insert into mobile_phrases (name,value,cat) values('events_no_types','لا توجد أنواع','events');
insert into mobile_phrases (name,value,cat) values('events_add','اضافة','events');
insert into mobile_phrases (name,value,cat) values('the_color','اللون','events');